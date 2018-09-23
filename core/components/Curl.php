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
    private $ch;

    /**
     * Set options for curl
     *
     * Puts options in array in pattern:
     * Key - curl option
     * Value - curl option value
     * 
     * @example
     * $this->setOpts([
     *     CURLOPT_RETURNTRANSFER => true
     * ]);
     * @param array $opts array of curl options
     */
    public function setOpts(array $opts) {
        foreach ($opts as $param => $value) {
            curl_setopt($this->ch, $param, $value);
        }
    }

    /**
     * Creates curl file
     *
     * @param string $file path to file
     * @param string $mime mime type of file
     * @param string $baseName base name of file
     * @return \CURLFile
     */
    public function createFile($file, $mime, $baseName): \CURLFile
    {
        return curl_file_create($file, $mime, $baseName);
    }

    /**
     * Execs curl query
     *
     * @return string
     */
    public function exec(): string
    {
        return curl_exec($this->ch);
    }

    /**
     * Returns version of curl extension
     *
     * @return string
     */
    public static function getVersion(): string
    {
        return curl_version()['version'];
    }

    /**
     * Returns text of curl error
     *
     * @return string
     */
    public function getError(): string
    {
        return curl_error($this->ch);
    }

    /**
     * Returns code of curl error
     *
     * @return int
     */
    public function getErrno(): int
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
     * @param null|string $url connect to url
     */
    public function __construct($url = null)
    {
        try {
            if (!extension_loaded('curl_init')) {
                throw new ExtensionNotFoundException('CURL');
            }

            $this->ch = curl_init($url);
        } catch (ExtensionNotFoundException $e) {
            $e->printError();
            exit();
        }
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
