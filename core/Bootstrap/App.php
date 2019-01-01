<?php

namespace Core\Bootstrap;

use Core\Justify;
use Core\Components\Mvc\ControllerFactory;
use Core\Components\Http\CSRF;
use Core\Exceptions\CSRFProtectionException;
use Core\Components\Http\Request;
use Core\Exceptions\InvalidConfigException;

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
     */
    public function run()
    {
        $route = $this->router->findRoute($this->getHttpMethod(), $this->getURI());

        if (!$route['found']) {
            echo $this->render404();

            return;
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
     * @throws
     * @param array $settings stores array with settings
     */
    public function __construct(array $settings)
    {
        $init = new Init($settings);
        $init->initSettings();
        $init->loadLang();

        if (Justify::$settings['CSRFProtection']) {
            $this->CSRFProtection();
        }

        $this->router = $init->getRouter();
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

        $request = new Request();

        if ($request->isPost()) {
            CSRF::checkHashesEquals($request->session, $request);
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
     * Renders 404 page
     *
     * @since 2.3.0
     * @param string $message
     * @return string
     */
    private function render404(string $message = 'Page not found!'): string
    {
        return render('errors/404', ['message' => $message]);
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
