<?php

namespace Justify\Core;

use Justify;
use Justify\Exceptions\NotFoundException;
use Justify\Exceptions\InvalidConfigException;
use Justify\Exceptions\OldPHPVersionException;

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
            if (preg_match("#^$pattern$#iu", $this->_getURI(), $matches)) {
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

                    return;
                } catch (InvalidConfigException $e) {
                    $e->printError();
                    exit();
                } catch (NotFoundException $e) {
                }

            }
        }
        try {
            throw new NotFoundException('Search page not found!', 'Error 404');
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

        try {
            if (!version_compare(PHP_VERSION, Justify::$minimalPHPVersion, '>=')) {
                throw new OldPHPVersionException('PHP version must be bigger than 7.0.0');
            }
        } catch (OldPHPVersionException $e) {
            $e->printError();
            exit();
        }

        Justify::$settings = $settings;

        Justify::$debug = Justify::$settings['debug'];
        Justify::$home = Justify::$settings['homeURL'];
        Justify::$lang = Justify::$settings['html']['lang'];
        Justify::$charset = Justify::$settings['html']['charset'];
        Justify::$web = Justify::$settings['webPath'];

        $this->_settingsHandler();
        $this->_urls = require_once BASE_DIR . '/vendor/urls.php';
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
        if (!isset($_SERVER['REDIRECT_URL'])) {
            $_SERVER['REDIRECT_URL'] = '';
        }

        return trim($_SERVER['REDIRECT_URL'], '/');
    }
}
