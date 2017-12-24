<?php

namespace Justify\Core;

use Justify;
use Justify\System\BaseObject;
use Justify\Exceptions\JustifyException;
use Justify\Exceptions\CauseFromConsoleException;
use Justify\Exceptions\NotFoundException;
use Justify\Exceptions\InvalidConfigException;
use Justify\Exceptions\OldPHPVersionException;

/**
 * The Core of framework
 * Launches the application
 */
class App extends BaseObject
{
    /**
     * Need to check URI for existence in array
     * in file urls.php
     *
     * @access private
     * @var bool
     */
    private $_uriExists = false;

    /**
     * List of urls
     *
     * File: vendor/urls.php
     *
     * @var array
     */
    private $_urls = [];

    /**
     * Method launches the application
     *
     * @access public
     */
    public function run()
    {
        foreach ($this->_urls as $pattern => $controllerAndAction) {
            if (preg_match("#^/$pattern$#iu", $this->_getURI(), $matches)) {
                $this->_uriExists = true;

                $segments = explode('/', $controllerAndAction);
                $controller = $segments[0];
                $action = $segments[1];

                Justify::$controller = $controller;
                Justify::$action = $action;

                try {
                    $controller = 'App\\Controllers\\' . ucfirst($controller) . 'Controller';
                    $action = 'action' . ucfirst($action);

                    $controller = new $controller($matches);

                    if (!is_subclass_of($controller, 'Justify\System\Controller')) {
                        throw new InvalidConfigException(
                            'Controller class must extend from Justify\System\Controller'
                        );
                    }

                    echo $controller->$action();

                    if (!Justify::$execTime) {
                        Justify::$execTime = microtime(true) - Justify::$startTime;
                    }
                } catch (JustifyException $e) {
                    $e->printError();
                    exit();
                } catch (InvalidConfigException $e) {
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
     *
     * @param array $settings stores array with settings
     */
    public function __construct(array $settings)
    {
        Justify::$startTime = microtime(true);
        Justify::$settings = $settings;
        Justify::$debug = Justify::$settings['debug'];

        try {
            if (!version_compare(PHP_VERSION, Justify::$minimalPHPVersion, '<=')) {
                throw new OldPHPVersionException("PHP version must be bigger than " . Justify::$minimalPHPVersion);
            }
            if (php_sapi_name() == 'cli') {
                throw new CauseFromConsoleException('Web application caused from console');
            }
        } catch (OldPHPVersionException $e) {
            $e->printError();
            exit();
        } catch (CauseFromConsoleException $e) {
            $e->printError();
            exit();
        }

        $this->_urls = require_once BASE_DIR . '/config/urls.php';



        foreach (Justify::$settings['components']['css'] as &$css) {
            $css = Justify::$settings['webPath'] . $css;
        }
        foreach (Justify::$settings['components']['js'] as &$js) {
            $js = Justify::$settings['webPath'] . $js;
        }

        Justify::$home = Justify::$settings['homeURL'];
        Justify::$lang = Justify::$settings['html']['lang'];
        Justify::$web = Justify::$settings['webPath'];

        $this->_settingsHandler();
    }

    /**
     * The method sets the required settings for the application
     *
     * @access private
     * @return void
     */
    private function _settingsHandler()
    {
        if (Justify::$debug) {
            ini_set('display_errors', 'On');
            error_reporting(E_ALL);
        } else {
            ini_set('display_errors', 'Off');
            error_reporting(0);
        }

        date_default_timezone_set(Justify::$settings['timezone']);
        setlocale(LC_ALL, Justify::$settings['language']);
    }

    /**
     * Method return current URI address
     * without GET query
     *
     * @access private
     * @return string
     */
    private function _getURI()
    {
        $uri = parse_url($_SERVER['REQUEST_URI']);
        return $uri['path'];
    }
}
