<?php

namespace Justify\System;

/**
 * Class Response
 *
 * Class for working with HTTP response
 *
 * @since 2.3.0
 * @package Justify\System
 */
class Response
{
    /**
     * Refresh current page
     *
     * @since 2.3.0
     * @param integer|float $seconds seconds to wait
     */
    public function refresh(float $seconds = 0)
    {
        header("Refresh: $seconds");
    }

    /**
     * Redirect user to pointed address
     *
     * @since 2.3.0
     * @param string $to path to redirect address
     */
    public function redirect(string $to)
    {
        header("Location: $to");
    }

    /**
     * Redirect user on previous page
     *
     * @since 2.3.0
     */
    public function goBack()
    {
        header("Location: {$_SERVER['HTTP_REFERER']}");
    }

    /**
     * Redirects to home page
     *
     * Home page value specified in file config/settings.php in directive "homeUrl"
     *
     * @since 2.3.0
     */
    public function goHome()
    {
        header('Location: ' . Justify::$home);
    }
}
