<?php

namespace Justify\Bootstrap;

use Justify;
use Justify\System\CSRF;
use Justify\System\Request;
use Justify\Exceptions\CSRFProtectionException;
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
            if (preg_match("#^/?$pattern$#iu", $this->getURI(), $matches)) {
                $this->uriExists = true;

                $segments = explode('@', $controllerAndAction);
                list($controller, $action) = $segments;
                list(Justify::$controller, Justify::$action) = $segments;

                try {
                    $controller = 'App\\Controllers\\' . ucfirst($controller) . 'Controller';

                    $controller = new $controller($matches);

                    if (!$this->isSubclassOfBaseController($controller)) {
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

                    if (!Justify::$execTime) {
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
        $init->loadLang();

        if (Justify::$settings['CSRFProtection']) {
            $this->CSRFProtection();
        }

        $this->routes = $init->getRoutes();
    }

    /**
     * Init protection from CSRF attacks
     *
     * @since 2.2.0
     */
    private function CSRFProtection()
    {
        CSRF::$token = CSRF::generateToken();

        $request = new Request();

        try {
            if ($request->isPost()) {
                CSRF::checkHashesEquals($request->session, $request);
            } else {
                CSRF::setSession();
            }
        } catch (CSRFProtectionException $e) {
            $e->printError();
        }
    }

    /**
     * Checks class extended by base controller
     *
     * @since 2.2.0
     * @param object $controller
     * @return bool
     */
    private function isSubclassOfBaseController(object $controller): bool
    {
        return is_subclass_of($controller, 'Justify\System\Controller');
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
}
