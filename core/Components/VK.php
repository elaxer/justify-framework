<?php

namespace Core\Components;

use Core\Exceptions\ExtensionNotFoundException;

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
        $this->setOpts($params, [
            'access_token' => $this->accessToken,
            'version' => $this->apiVersion
        ]);

        return $this->sendRequest($method, $params);
    }

    /**
     * Sends photo to user or group
     *
     * Loads photo to VK server and sends photo to user or group
     * Necessary to have CURL library
     *
     * @param string $file path to photo
     * @param array $params request params
     * @throws ExtensionNotFoundException
     * @return object|bool
     */
    public function sendPhoto(string $file, array $params)
    {
        $photo = $this->uploadPhoto($file);

        $params['attachment'] = $photo->id;

        return $this->api('messages.send', $params);
    }

    /**
     * Displays URI to application authorisation
     *
     * @param array array of params
     * @return string link
     */
    public function initApp(array $params): string
    {
        $this->setOpts($params, [
            'scope' => implode(',', $this->scopes),
            'redirect_uri' => 'https://oauth.vk.com/blank.html',
            'response_type' => 'token',
            'display' => 'page'
        ]);

        return urldecode('https://oauth.vk.com/authorize?' . http_build_query($params));
    }

    /**
     * Init access token and API version
     *
     * @param string $accessToken access token of your VK application
     * @param string $apiVersion VK API version
     */
    public function __construct(string $accessToken = '', string $apiVersion)
    {
        $this->accessToken = $accessToken;
        $this->apiVersion = $apiVersion;
    }

    /**
     * @param array $params
     * @param $key
     * @param $value
     */
    private function setOpt(array &$params, $key, $value)
    {
        if (!isset($params[$key])) {
            $params[$key] = $value;
        }
    }

    /**
     * @param array $params
     * @param $data
     */
    private function setOpts(array &$params, $data)
    {
        foreach ($data as $key => $value) {
            $this->setOpt($params, $key, $value);
        }
    }

    /**
     * @param $file
     * @return mixed
     * @throws ExtensionNotFoundException
     */
    private function uploadPhoto($file)
    {
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

        $photo = json_decode($curl->exec());

        $curl->close();

        return $this->savePhoto($photo);
    }

    /**
     * @param $photo
     * @return mixed
     */
    private function savePhoto($photo)
    {
        return $this->api('photos.saveMessagesPhoto', [
            'server' => $photo->server,
            'photo' => $photo->photo,
            'hash' => $photo->hash
        ])->response[0];
    }

    /**
     * @param $method
     * @param array $params
     * @return mixed
     */
    private function sendRequest($method, array $params = [])
    {
        $params = http_build_query($params);

        $file = file_get_contents("https://api.vk.com/method/$method?$params");

        return json_decode($file);
    }
}
