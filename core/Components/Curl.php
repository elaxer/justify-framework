<?php

namespace Core\Components;

use Core\Exceptions\ExtensionNotFoundException;

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
    private $ch;

    /**
     * Set options for curl
     *
     * Puts options in array in pattern:
     * Key - curl option
     * Value - curl option value
     *
     * @param array $opts array of curl options
     */
    public function setOpts(array $opts)
    {
        curl_setopt_array($this->ch, $opts);
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
     * Execs curl query
     *
     * @return string
     */
    public function exec()
    {
        return curl_exec($this->ch);
    }

    /**
     * Returns version of curl extension
     *
     * @return string
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
        return curl_error($this->ch);
    }

    /**
     * Returns code of curl error
     *
     * @return int
     */
    public function getErrno()
    {
        return curl_errno($this->ch);
    }

    /**
     * Closes curl connection
     */
    public function close()
    {
        curl_close($this->ch);
        $this->ch = null;
    }

    /**
     * Curl constructor
     *
     * Init Curl::$ch
     *
     * @throws ExtensionNotFoundException
     * @param null|string $url connect to url
     */
    public function __construct($url = null)
    {
        if (!extension_loaded('curl_init')) {
            throw new ExtensionNotFoundException('CURL');
        }

        $this->ch = curl_init($url);
    }

    /**
     * Closed curl connection if not closed
     */
    public function __destruct()
    {
        if (!is_null($this->ch)) {
            $this->close();
        }
    }
}
