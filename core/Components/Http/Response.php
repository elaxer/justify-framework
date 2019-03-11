<?php

namespace Core\Components\Http;

use Core\Justify;

/**
 * Class Response
 *
 * Class for working with HTTP response
 *
 * @since 2.3.0
 * @package Core\System
 */
class Response
{
    /**
     * Refresh current page
     *
     * @since 2.3.0
     * @param integer|float $seconds seconds to wait
     */
    public function refresh($seconds = 0)
    {
        header("Refresh: $seconds");
    }

    /**
     * Redirect user to pointed address
     *
     * @since 2.3.0
     * @param string $to path to redirect address
     */
    public function redirect($to)
    {
        header("Location: $to");
    }
    
    public function getReferer()
    {
        return $_SERVER['HTTP_REFERER'];
    }

    /**
     * Redirect user on previous page
     *
     * @since 2.3.0
     */
    public function goBack()
    {
        $this->redirect($this->getReferer());
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
        $this->redirect(Justify::$home);
    }
}
