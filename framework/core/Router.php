<?php

namespace framework\core;

class Router
{
    private static $settings;

    public static function run()
    {
        self::settingsHandler();
        $uri = self::getURI();
        foreach (self::$settings['apps'] as $app) {
            $urls = require_once BASE_DIR . '/apps/' . $app . '/urls.php';
            foreach ($urls as $pattern => $action) {
                if (preg_match("~$pattern~", $uri, $matches)) {
                    define('ACTIVE_APP', $app);
                    if (is_array($action)) {
                        define('ACTION_NAME', 'URL rendering');

                        $controllerName = 'apps\\' . $app . '\\' . ucfirst($app) . 'Controller';
                        $controller = new $controllerName;
                        $result = $controller->render($action['view'], $action['vars']);

                        break(2);
                    } else {
                        $controllerName = 'apps\\' . $app . '\\' . ucfirst($app) . 'Controller';
                        $actionName = 'action' . ucfirst($action);

                        define('ACTION_NAME', $action);

                        $controller = new $controllerName;
                        $controller->$actionName($matches);
                      
                        break(2);

                    }

                }
            }


        }

    }

    private static function getURI()
    {
        return trim($_SERVER['REQUEST_URI'], '/');
    }

    private static function settingsHandler()
    {
        self::$settings = require BASE_DIR . '/config/settings.php';
        date_default_timezone_set(self::$settings['timezone']);
        if (self::$settings['debug'] === true) {
            ini_set('display_errors', 'on');
            error_reporting(E_ALL);
        } else {
            //ini_set('display_errors', 'off');
            error_reporting(-1);
        }
    }

}
