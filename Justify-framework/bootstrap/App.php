<?php

namespace Justify\Bootstrap;

use Justify;
use Justify\Exceptions\JustifyException;
use Justify\Exceptions\NotFoundException;
use Justify\Exceptions\InvalidConfigException;

/**
 * The Core of framework
 * Launches the application
 */
class App
{
    /**
     * Need to check URI for existence in array
     * in file urls.php
     *
     * @var bool
     */
    private $uriExists = false;

    /**
     * Array of routes
     *
     * File: vendor/routes.php
     *
     * @var array
     */
    private $routes;

    /**
     * Method launches the application
     */
    public function run()
    {
        foreach ($this->routes as $pattern => $controllerAndAction) {
            if (preg_match("#^/$pattern$#iu", $this->getURI(), $matches)) {
                $this->uriExists = true;

                $segments = explode('/', $controllerAndAction);
                list($controller, $action) = $segments;
                list(Justify::$controller, Justify::$action) = $segments;

                try {
                    $controller = 'App\\Controllers\\' . ucfirst($controller) . 'Controller';
                    $action = 'action' . ucfirst($action);

                    $controller = new $controller($matches);

                    if (! is_subclass_of($controller, 'Justify\System\Controller')) {
                        throw new InvalidConfigException(
                            'Controller class must extend from Justify\System\Controller'
                        );
                    }

                    $response = $controller->$action();

                    if (is_string($response) || is_numeric($response)) {
                        echo $response;
                    } else if (is_object($response) || is_array($response) || is_bool($response)) {
                        dump($response);
                    }

                    if (! Justify::$execTime) {
                        Justify::$execTime = microtime(true) - Justify::$startTime;
                    }
                } catch (JustifyException $e) {
                    $e->printError();
                    exit();
                }

                return;
            }
        }
        try {
            throw new NotFoundException('Page not found!');
        } catch (NotFoundException $e) {
        }
    }

    /**
     * Application constructor.
     *
     * Loads array of settings to next application work
     * Sets magic functions
     *
     * @param array $settings stores array with settings
     */
    public function __construct(array $settings)
    {
        spl_autoload_register(['Justify', 'autoloadFunction']);

        $init = new Init($settings);
        $init->initSettings();
        $init->loadHelpers();
        $init->loadWebComponents();

        $this->routes = $init->getRoutes();
    }

    /**
     * Method return current URI address
     *
     * @return string
     */
    private function getURI()
    {
        return parse_url($_SERVER['REQUEST_URI'])['path'];
    }
}
