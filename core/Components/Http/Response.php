<?php

namespace Core\Components\Http;

use Core\Justify;
use Symfony\Component\HttpFoundation\RedirectResponse;

/**
 * Class Response
 *
 * Class for working with HTTP response
 *
 * @since 2.3.0
 * @package Core\System
 */
class Response extends \Symfony\Component\HttpFoundation\Response
{
    /**
     * Refresh current page
     *
     * @since 2.3.0
     * @param integer|float $seconds seconds to wait
     */
    public function refresh($seconds = 0)
    {
        $this->headers->set('refresh', $seconds);
        $this->send();
    }

    /**
     * Redirect user to pointed address
     *
     * @since 2.3.0
     * @param string $to path to redirect address
     */
    public function redirect($to)
    {
        $response = new RedirectResponse($to);
        $response->send();
    }

    /**
     * Redirect user on previous page
     *
     * @since 2.3.0
     */
    public function goBack()
    {
        if (request()->server->get('HTTP_REFERER') != '') {
            $this->redirect(request()->server->get('HTTP_REFERER'));
        }
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
        $this->redirect(config('home'));
    }
}
