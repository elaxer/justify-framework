<?php

namespace justify\framework\core;

class Router
{
    private static $uri, $uriExists;

    public static function run()
    {
        global $settings;
        self::settingsHandler();

        self::$uri = self::getURI();

        foreach ($settings['apps'] as $app) {
            $urls = require_once APPS_DIR . '/' . $app . '/urls.php';
            self::$uriExists = false;

            foreach ($urls as $pattern => $action) {
                if (preg_match("~$pattern~", self::$uri, $matches)) {
                    define('ACTIVE_APP', $app);
                    define('ACTION', $action);

                    self::$uriExists = true;

                    if (is_array($action)) {
                        define('ACTION_NAME', 'URL rendering');

                        $controllerName = 'justify\\apps\\' . $app . '\\' . ucfirst($app) . 'Controller';

                        $controller = new $controllerName;
                        $controller->template = $settings['template'];
                        $controller->render($action['view'], $action['vars']);
                    } else {
                        define('ACTION_NAME', $action);

                        $controllerName = 'justify\\apps\\' . $app . '\\' . ucfirst($app) . 'Controller';
                        $actionName = 'action' . ucfirst($action);

                        $controller = new $controllerName;
                        if (!isset($controller->template)) {
                            $controller->template = $settings['template'];
                        }
                        $controller->$actionName($matches);

                        break(2);
                    }

                }
            }

            if (self::$uriExists === false) {
                define('ACTION_NAME', 'Null');
                define('ACTIVE_APP', 'Null');

                self::error404();
            }

        }

    }

    private static function settingsHandler()
    {
        global $settings;
        if ($settings['debug'] === true) {
            ini_set('display_errors', 'On');
            error_reporting(E_ALL);
        } else {
            ini_set('display_errors', 'Off');
            ini_set('error_log', 'On');
            error_reporting(0);

        }
        date_default_timezone_set($settings['timezone']);
    }

    private static function getURI()
    {
        return trim($_SERVER['REQUEST_URI'], '/');
    }

    private static function error404()
    {
        global $settings;
        require_once VIEWS_DIR . '/' . $settings['404page'];
    }
}
