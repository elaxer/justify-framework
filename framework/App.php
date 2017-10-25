<?php

namespace justify\framework;

/**
 * The Core of framework
 * Launches the application
 */
class App
{
    /**
     * Need to check URI for exsitsion in array
     * in file urls.php
     * 
     * @access private
     * @var bool
     */
    private $uriExists;

    /**
     * Stores returns settings in the file urls.php 
     * 
     * @access private
     * @var array
     */
    private $settings;

    /**
     * Method launches the application
     *
     * @access public
     */
    public function run()
    {
        foreach ($this->settings['apps'] as $app) {
            $urls = require_once APPS_DIR . '/' . $app . '/urls.php';

            foreach ($urls as $pattern => $action) {
                if (preg_match("#^$pattern$#", $this->getURI(), $matches)) {
                    define('ACTIVE_APP', $app);
                    define('ACTION', $action);

                    $this->uriExists = true;

                    $controllerName = 'justify\\apps\\' . $app . '\\' . ucfirst($app) . 'Controller';
                    $action = 'action' . ucfirst($action);

                    $controller = new $controllerName;
                    echo $controller->$action($matches);

                    break(2);
                }
            }
        }
        if (!$this->uriExists) {
            $this->error404();
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
        $this->settings = $settings;
        $this->settingsHandler();
        $this->uriExists = false;
    }

    /**
     * The method sets the required settings for the application
     *
     * @access private
     */
    private function settingsHandler()
    {
        if ($this->settings['debug'] === true) {
            ini_set('display_errors', 'On');
            error_reporting(E_ALL);
        } else {
            ini_set('display_errors', 'Off');
            ini_set('error_log', 'On');
            error_reporting(0);

        }
        date_default_timezone_set($this->settings['timezone']);
    }

    /**
     * Method return current URI address
     * without GET query
     *
     * @access private
     * @return string
     */
    private function getURI()
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
     */
    private function error404()
    {
        define('ACTION_NAME', 'Null');
        define('ACTIVE_APP', 'Null');

        define('HEAD', TEMPLATES_DIR . '/' . $this->settings['template'] . '/head.php');
        define('HEADER', TEMPLATES_DIR . '/' . $this->settings['template'] . '/header.php');
        define('FOOTER', TEMPLATES_DIR . '/' . $this->settings['template'] . '/footer.php');

        require_once VIEWS_DIR . '/' . $this->settings['404page'];
    }

}
