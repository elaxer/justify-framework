<?php

namespace Justify\Core;

use Justify;

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
    private $_uriExists;

    /**
     * Stores returns settings in the file urls.php
     *
     * @access private
     * @var array
     */
    private $_settings;

    /**
     * Method launches the application
     *
     * @access public
     */
    public function run()
    {
        foreach ($this->_settings['apps'] as $app) {
            $urls = require_once APPS_DIR . '/' . $app . '/urls.php';
            foreach ($urls as $pattern => $action) {
                if (preg_match("#^$pattern$#iu", $this->_getURI(), $matches)) {
                    Justify::$app = $app;
                    Justify::$action = $action;

                    $this->_uriExists = true;

                    $controllerName = 'App\\' . ucfirst($app) . '\\' . ucfirst($app) . 'Controller';
                    $action = 'action' . ucfirst($action);

                    $controller = new $controllerName();
                    echo $controller->$action($matches);

                    break(2);
                }
            }
        }
        if (!$this->_uriExists) {
            $this->_error404();
        }
    }

    /**
     * Application constructor.
     *
     * Loads array of settings to next application work
     *
     * @param array $settings stores array with settings
     */
    public function __construct($settings)
    {
        $this->_settings = $settings;

        Justify::$settings = $settings;
        Justify::$startTime = microtime(true);
        Justify::$aliases = array_merge(Justify::$aliases, Justify::$settings['aliases']);

        $this->_settingsHandler();
        $this->_uriExists = false;
    }

    /**
     * The method sets the required settings for the application
     *
     * @access private
     * @return void
     */
    private function _settingsHandler()
    {
        if ($this->_settings['debug'] === true) {
            ini_set('display_errors', 'On');
            error_reporting(E_ALL);
        } else {
            ini_set('display_errors', 'Off');
            error_reporting(0);

        }
        date_default_timezone_set($this->_settings['timezone']);
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

    /**
     * Method includes 404 page if URI doesn't match with route
     *
     * @access private
     * @return void
     */
    private function _error404()
    {
        define('ACTION_NAME', 'Null');
        define('ACTIVE_APP', 'Null');

        define('HEAD', TEMPLATES_DIR . '/' . $this->_settings['template'] . '/head.php');
        define('HEADER', TEMPLATES_DIR . '/' . $this->_settings['template'] . '/header.php');
        define('FOOTER', TEMPLATES_DIR . '/' . $this->_settings['template'] . '/footer.php');

        require_once VIEWS_DIR . '/' . $this->_settings['404page'];
    }

}
