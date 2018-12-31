<?php

namespace Core\Bootstrap;

use Core\Justify;
use Core\System\ControllerFactory;
use Core\System\CSRF;
use Core\System\Request;
use Core\System\Exceptions\InvalidConfigException;

/**
 * The Core of framework
 * Launches the application
 */
class App
{
    /**
     * Array of routes
     *
     * File: config/routes.php
     *
     * @var array
     */
    private $routes;

    /**
     * Method launches the application
     *
     * @throws InvalidConfigException
     */
    public function run()
    {
        $uri = $this->getURI();
        $routeExists = false;

        foreach ($this->routes as $pattern => $controllerAndAction) {
            $pattern = $this->createPattern($pattern);

            if (!preg_match($pattern, $uri, $matches)) {
                continue;
            }

            $routeExists = true;

            $segments = explode('@', $controllerAndAction);
            list($controller, $action) = $segments;

            $controller = ControllerFactory::create($controller, $matches);

            if (!$this->implementsBaseController($controller)) {
                throw new InvalidConfigException(
                    'Controller class must extend from Core\System\Controller'
                );
            }

            $response = $controller->$action();
            $this->displayResponse($response);

            $this->setExecTime();

            break;
        }

        if (!$routeExists) {
            echo $this->render404();
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

        if ($request->isPost()) {
            CSRF::checkHashesEquals($request->session, $request);
        } else {
            CSRF::setSession();
        }
    }

    /**
     * Checks class extended by base controller
     *
     * @since 2.2.0
     * @param object $controller
     * @return bool
     */
    private function implementsBaseController(object $controller): bool
    {
        return is_subclass_of($controller, 'Core\System\Controller');
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

    /**
     * Creates pattern
     *
     * @since 2.3.0
     * @param string $pattern
     * @return string
     */
    private function createPattern(string $pattern): string
    {
        return "#^/?$pattern$#iu";
    }
}
