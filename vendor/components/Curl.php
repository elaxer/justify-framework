<?php

namespace Justify\Components;

use Justify\Exceptions\ExtensionNotFoundException;

/**
 * Class Curl for working with network
 *
 * Simplifies work with curl extension
 *
 * @since 1.6
 * @package Justify\Components
 */
class Curl
{
    /**
     * Curl descriptor
     *
     * @var resource
     */
    private $_ch;

    /**
     * Curl constructor
     *
     * Init Curl::$_ch
     *
     * @param null|string $url connect to url
     */
    public function __construct($url = null)
    {
        try {
            if (!function_exists('curl_init')) {
                throw new ExtensionNotFoundException('CURL');
            }

            $this->_ch = curl_init($url);
        } catch (ExtensionNotFoundException $e) {
            $e->printError();
            exit();
        }
    }

    /**
     * Set options for curl
     *
     * Puts options in array in pattern:
     * Key - curl option
     * Value - curl option value
     * Example:
     * $this->setOpts([
     *     CURLOPT_RETURNTRANSFER => true
     * ]);
     *
     * @param array $opts array of curl options
     */
    public function setOpts(array $opts) {
        foreach ($opts as $param => $value) {
            curl_setopt($this->_ch, $param, $value);
        }
    }

    /**
     * Closes curl connection
     */
    public function close()
    {
        curl_close($this->_ch);
    }

    /**
     * Creates curl file
     *
     * @param string $file path to file
     * @param string $mime mime type of file
     * @param string $baseName base name of file
     * @return \CURLFile
     */
    public function createFile($file, $mime, $baseName)
    {
        return curl_file_create($file, $mime, $baseName);
    }

    /**
     * Returns version of curl extension
     *
     * @return mixed
     */
    public static function getVersion()
    {
        return curl_version()['version'];
    }

    /**
     * Returns text of curl error
     *
     * @return string
     */
    public function getError()
    {
        return curl_error($this->_ch);
    }

    /**
     * Returns code of curl error
     *
     * @return int
     */
    public function getErrno()
    {
        return curl_errno($this->_ch);
    }

    /**
     * Execs curl query
     *
     * @return mixed
     */
    public function exec()
    {
        return curl_exec($this->_ch);
    }
}
