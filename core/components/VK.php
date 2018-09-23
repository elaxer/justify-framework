<?php

namespace Core\Components;

use Core\System\Exceptions\ExtensionNotFoundException;

/**
 * Class VK
 *
 * Simple component for working with VK API
 *
 * @since 1.6
 * @package Justify\Components
 */
class VK
{
    /**
     * Stores your access token of your vk application
     *
     * @var string
     */
    public $accessToken;

    /**
     * Stores VK API version
     *
     * @var string
     */
    public $apiVersion;

    /**
     * Stores array of all scopes to init VK application
     *
     * @var array
     */
    public $scopes = [
        'notify', 'friends', 'photos', 'audio',
        'video', 'docs', 'notes', 'pages', 'status',
        'wall', 'groups', 'messages', 'email', 'notifications',
        'stats', 'ads', 'market', 'offline'
    ];

    /**
     * Main method to work with VK API
     *
     * Send request to https://api.vk.com/method/<method.name>?<params>
     * ,and return object of data
     *
     * @param string $method VK API method name
     * @param array $params array of params
     * @return object
     */
    public function api(string $method, array $params = []): object
    {
        if (! isset($params['access_token']))
            $params['access_token'] = $this->accessToken;

        if ($this->apiVersion)
            $params['version'] = $this->apiVersion;

        $params = http_build_query($params);

        $file = file_get_contents("https://api.vk.com/method/$method?$params");

        return json_decode($file);
    }

    /**
     * Sends photo to user or group
     *
     * Loads photo to VK server and sends photo to user or group
     * Necessary to have CURL library
     *
     * @param string $file path to photo
     * @param array $params request params
     * @return object|bool
     */
    public function sendPhoto(string $file, array $params)
    {
        try {
            if (! function_exists('curl_init')) {
                throw new ExtensionNotFoundException('CURL');
            }

            $result = $this->api('photos.getMessagesUploadServer');

            $curl = new Curl($result->response->upload_url);

            $file = $curl->createFile($file, mime_content_type($file), pathinfo($file)['basename']);

            $curl->setOpts([
                CURLOPT_POST => true,
                CURLOPT_HTTPHEADER => ['Content-type: multipart/form-data;charset=utf8'],
                CURLOPT_POSTFIELDS => ['file' => $file],
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_TIMEOUT => 10,
                CURLOPT_FOLLOWLOCATION => true
            ]);

            $responseImage = json_decode($curl->exec());

            $curl->close();

            $resultImage = $this->api('photos.saveMessagesPhoto', [
                'server' => $responseImage->server,
                'photo' => $responseImage->photo,
                'hash' => $responseImage->hash
            ]);

            $params['attachment'] = $resultImage->response[0]->id;

            return $this->api('messages.send', $params);
        } catch (ExtensionNotFoundException $e) {
            $e->printError();
            exit();
        }
    }

    /**
     * Displays URI to application authorisation
     *
     * @param array array of params
     * @return string link
     */
    public function initApp(array $params): string
    {
        if (! isset($params['scope']))
            $params['scope'] = implode(',', $this->scopes);

        if (! isset($params['redirect_uri']))
            $params['redirect_uri'] = 'https://oauth.vk.com/blank.html';

        if (! isset($params['response_type']))
            $params['response_type'] = 'token';

        if (! isset($params['display']))
            $params['display'] = 'page';

        return urldecode('https://oauth.vk.com/authorize?' . http_build_query($params));
    }

    /**
     * Init access token and API version
     *
     * @param string $accessToken access token of your VK application
     * @param string $apiVersion VK API version
     */
    public function __construct(string $accessToken = '', string $apiVersion = '')
    {
        $this->accessToken = $accessToken;

        if ($apiVersion) {
            $this->apiVersion = $apiVersion;
        }
    }
}
