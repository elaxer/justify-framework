<?php

namespace Core\System;

/**
 * Class Request
 *
 * Request info
 *
 * @since 2.0
 * @package Justify\System
 */
class Request
{
    /**
     * Object of class Session
     *
     * @var object
     */
    public $session;

    /**
     * If $key null then returns $_GET array else if exists $_GET[$key] then returns $_GET[$key]
     * else returns $defaultValue
     *
     * @param null|string|int $key key of get param
     * @param null $defaultValue default value returns if $_GET[$key] doesn't exists
     * @return null|mixed
     */
    public function get($key = null, $defaultValue = null)
    {
        if ($key == null) {
            return $_GET;
        }

        return $_GET[$key] ?? $defaultValue;
    }

    /**
     * If $key null then returns $_POST array else if exists $_POST[$key] then returns $_POST[$key]
     * else returns $defaultValue
     *
     * @param null|string|int $key key of post param
     * @param null $defaultValue default value returns if $_POST[$key] doesn't exists
     * @return null|mixed
     */
    public function post($key = null, $defaultValue = null)
    {
        if ($key == null) {
            return $_POST;
        }

        return $_POST[$key] ?? $defaultValue;
    }

    /**
     * If request method equals "GET" then returns true else false
     *
     * @return bool
     */
    public function isGet(): bool
    {
        return $_SERVER['REQUEST_METHOD'] == 'GET';
    }

    /**
     * If request method equals "POST" then returns true else false
     *
     * @return bool
     */
    public function isPost(): bool
    {
        return $_SERVER['REQUEST_METHOD'] == 'POST';
    }

    /**
     * If $key null then returns $_REQUEST array else if exists $_REQUEST[$key] then returns $_REQUEST[$key]
     * else returns $defaultValue
     *
     * @param null|string|int $key key of request param
     * @param null $defaultValue default value returns if $_REQUEST[$key] doesn't exists
     * @return null|mixed
     */
    public function input($key = null, $defaultValue = null)
    {
        if ($key == null) {
            return $_REQUEST;
        }

        return $_REQUEST[$key] ?? $defaultValue;
    }

    /**
     * Returns user's IP address
     *
     * @return string
     */
    public function getUserIp(): string
    {
        return $_SERVER['REMOTE_ADDR'];
    }

    /**
     * Returns server's IP address
     *
     * @return string
     */
    public function getServerIp(): string
    {
        return $_SERVER['SERVER_ADDR'];
    }

    /**
     * Method returns current URI address
     *
     * @return string
     */
    public function getURI(): string
    {
        return parse_url($_SERVER['REQUEST_URI'])['path'];
    }

    /**
     * Request constructor.
     *
     * Sets session value
     */
    public function __construct()
    {
        $this->session = new Session();
    }
}