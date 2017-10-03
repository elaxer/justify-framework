<?php

namespace justify\framework\core;

class Router
{
    private static $settings;
    private static $uri, $uriExists;

    public static function run()
    {
        self::settingsHandler();

        self::$uri = self::getURI();

        foreach (self::$settings['apps'] as $app) {
            $urls = require_once APPS_DIR . '/' . $app . '/urls.php';
            self::$uriExists = false;

            foreach ($urls as $pattern => $action) {
                if (preg_match("~$pattern~", self::$uri, $matches)) {
                    define('ACTIVE_APP', $app);
                    self::$uriExists = true;

                    if (is_array($action)) {
                        define('ACTION_NAME', 'URL rendering');
                        $controllerName = 'justify\\apps\\' . $app . '\\' . ucfirst($app) . 'Controller';

                        $controller = new $controllerName;
                        $controller->render($action['view'], $action['vars']);

                        break(2);
                    } else {
                        $controllerName = 'justify\\apps\\' . $app . '\\' . ucfirst($app) . 'Controller';
                        $actionName = 'action' . ucfirst($action);

                        define('ACTION_NAME', $action);

                        $controller = new $controllerName;
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
        self::$settings = require_once CONFIG_DIR . '/settings.php';
        if (self::$settings['debug'] === true) {
            ini_set('display_errors', 'On');
            error_reporting(E_ALL);
        } else {
            ini_set('display_errors', 'Off');
            ini_set('error_log', 'On');
            error_reporting(0);

        }
        date_default_timezone_set(self::$settings['timezone']);
    }

    private static function getURI()
    {
        return trim($_SERVER['REQUEST_URI'], '/');
    }

    private static function error404()
    {
        require_once VIEWS_DIR . '/' . self::$settings['404page'];
    }
}
