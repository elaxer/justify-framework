<?php

namespace Core\Bootstrap;

use Core\Exceptions\CauseFromConsoleException;
use Core\Exceptions\CSRFProtectionException;
use Core\Exceptions\OldPHPVersionException;
use Core\Exceptions\RouteNotFoundException;
use Core\Justify;
use Core\Components\Mvc\ControllerFactory;
use Core\Components\Http\CSRF;

/**
 * The Core of framework
 * Launches the application
 */
class App
{
    /**
     * File: config/routes.php
     *
     * @var \Core\Components\Router\Router
     */
    private $router;

    /**
     * Method launches the application
     *
     */
    public function run()
    {
        try {
            $route = router()->findRoute($this->getHttpMethod(), $this->getURI());
        } catch (RouteNotFoundException $e) {
            error(404);
        }

        if (is_string($route['handler'])) {
            $segments = explode('@', $route['handler']);
            list($controller, $action) = $segments;

            $controller = ControllerFactory::create($controller, $route['vars']);

            $response = $controller->$action(...$route['vars']);
        }

        if (is_callable($route['handler'])) {
            $response = $route['handler'](...$route['vars']);
        }

        if (isset($response)) {
            $this->displayResponse($response);
        }
    }

    /**
     * Application constructor.
     *
     * Loads array of settings to next application work
     * Sets magic functions
     *
     * @throws CauseFromConsoleException
     * @throws OldPHPVersionException
     * @throws CSRFProtectionException
     * @param array $settings stores array with settings
     */
    public function __construct(array $settings)
    {
        $init = new Init($settings);
        $init->initSettings();
        $init->loadComponents();
        $init->loadRoutes();
        $init->loadLang();

        if (Justify::$settings['CSRFProtection']) {
            $this->CSRFProtection();
        }

        $this->router = router();
    }

    public function __destruct()
    {
        $this->setExecTime();
    }

    /**
     * Init protection from CSRF attacks
     *
     * @throws \Core\Exceptions\CSRFProtectionException
     * @since 2.2.0
     */
    private function CSRFProtection()
    {
        CSRF::$token = CSRF::generateToken();

        if (request()->isPost()) {
            CSRF::checkHashesEquals();
        } else {
            CSRF::setSession();
        }
    }

    /**
     * Method return current URI address
     *
     * @return string
     */
    private function getURI(): string
    {
        return parse_url($_SERVER['REQUEST_URI'])['path'];
    }

    /**
     * @return string HTTP method
     */
    private function getHttpMethod(): string
    {
        return $_SERVER['REQUEST_METHOD'];
    }

    /**
     * Sets execution time of script
     *
     * @since 2.3.0
     */
    private function setExecTime()
    {
        if (!Justify::$execTime) {
            Justify::$execTime = microtime(true) - Justify::$startTime;
        }
    }

    /**
     * Displays response in correct behaviour
     *
     * @since 2.3.0
     * @param string $response
     */
    private function displayResponse(string $response)
    {
        if (is_string($response) || is_numeric($response)) {
            echo $response;
        } else if (is_object($response) || is_array($response)) {
            dump($response);
        }
    }
}
