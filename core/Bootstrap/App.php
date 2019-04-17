<?php

namespace Core\Bootstrap;

use Core\Components\Mvc\ControllerFactory;
use Core\Components\Http\CSRF;
use Core\Exceptions\CauseFromConsoleException;
use Core\Exceptions\CSRFProtectionException;
use Core\Exceptions\NotFoundException;
use Core\Exceptions\OldPHPVersionException;
use Core\Exceptions\RouteNotFoundException;
use Core\Justify;

/**
 * The Core of framework
 *
 * Launches the application
 */
class App
{
    private $startTime;
    public $execTime;
    public $controller;
    public $action;

    /**
     * @var \Core\Container
     */
    public $container;

    /**
     * Application constructor.
     *
     * Loads array of settings to next application work
     * Sets magic functions
     *
     * @param array $settings stores array with settings
     * @throws CauseFromConsoleException
     * @throws OldPHPVersionException
     * @throws CSRFProtectionException
     */
    public function __construct(array $settings)
    {
        $this->startTime = microtime(true);
        Justify::$app = $this;

        $init = new Init($settings);
        $init->loadComponents();
        $init->initSettings();
        $init->loadRoutes();
        $init->loadLang();

        if (config('CSRFProtection')) {
            $this->CSRFProtection();
        }
    }

    /**
     * Method launches the application
     *
     * @throws \Core\Exceptions\NotFoundException if route not found
     */
    public function run()
    {
        try {
            $method = request()->getMethod();
            $path = request()->getBasePath();

            $route = router()->findRoute($method, $path);
        } catch (RouteNotFoundException $e) {
            throw new NotFoundException();
        }

        if (is_string($route['handler'])) {
            $segments = explode('@', $route['handler']);
            list($controller, $action) = $segments;

            $this->controller = $controller;
            $this->action = $action;

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

        if (request()->isMethod('POST')) {
            CSRF::checkHashesEquals();
        } else {
            CSRF::setSession();
        }
    }

    /**
     * Sets execution time of script
     *
     * @since 2.3.0
     */
    private function setExecTime()
    {
        $this->execTime = microtime(true) - $this->startTime;
    }

    /**
     * Displays response in correct behaviour
     *
     * @since 2.3.0
     * @param string $response
     */
    private function displayResponse($response)
    {
        if (is_string($response) || is_numeric($response)) {
            echo $response;
        } else if (is_object($response) || is_array($response)) {
            dump($response);
        }
    }
}
