<?php

namespace Core\Components\Http;

/**
 * Class Session
 *
 * Class for work session
 *
 * @since 2.0
 * @package Core\System
 */
class Session
{
    public function __construct()
    {
        session_start();
    }

    /**
     * If $key null then returns $_SESSION array else if exists $_SESSION[$key] then returns $_SESSION[$key]
     * else returns $defaultValue
     *
     * @param null|string|int $key key of session param
     * @param null $defaultValue default value returns if $_SESSION[$key] doesn't exists
     * @return null|mixed
     */
    public function get($key = null, $defaultValue = null)
    {
        if ($key == null) {
            return $_SESSION;
        }

        return $_SESSION[$key] ?? $defaultValue;
    }

    /**
     * Sets session
     *
     * @param string $key session key
     * @param mixed $value session value
     */
    public function set($key, $value)
    {
        $_SESSION[$key] = $value;
    }

    /**
     * If isset session with $key then returns true else false
     *
     * @param string $key session key
     * @return bool
     */
    public function has($key): bool
    {
        return isset($_SESSION[$key]);
    }

    /**
     * Destroys session
     */
    public function destroy()
    {
        $_SESSION = [];

        if (isset($_COOKIE[session_name()])) {
            unset($_COOKIE[session_name()]);
        }

        session_destroy();
    }
}
