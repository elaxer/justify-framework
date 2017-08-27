<?php

class Justify
{
    public $settings;

    public function __construct()
    {
        $this->settingsHandler();
    }


    public function run()
    {
        $uri = $this->getURI();
        foreach ($this->settings['apps'] as $app) {
            $urls = require_once BASE_DIR . '/apps/' . $app . '/urls.php';
            foreach ($urls as $pattern => $action) {
                if (preg_match("~$pattern~", $uri, $matches)) {
                    define('ACTIVE_APP', $app);
                    if (is_array($action)) {
                        if (file_exists(BASE_DIR . '/apps/' . $app . '/controller.php')) {
                            require_once BASE_DIR . '/apps/' . $app . '/controller.php';
                            $controllerName = ucfirst($app) . 'Controller';
                            $controller = new $controllerName;
                            define('ACTION_NAME', 'Using url rendering');
                        }

                        render($action['view'], $action['vars']);
                        break(2);
                    } else {
                        require_once BASE_DIR . '/apps/' . $app . '/controller.php';
                        $controllerName = ucfirst($app) . 'Controller';
                        $actionName = 'action' . ucfirst($action);
                        define('ACTION_NAME', $action);

                        $controller = new $controllerName;
                        $result = $controller->$actionName($matches);
                        break(2);
                    }

                }
            }


        }

    }

    private function getURI()
    {
        return trim($_SERVER['REQUEST_URI'], '/');
    }

    private function settingsHandler()
    {
        $this->settings = require_once BASE_DIR . '/settings.php';
        date_default_timezone_set($this->settings['timezone']);
        if ($this->settings['debug']) {
            ini_set('display_errors', 1);
            error_reporting(E_ALL);
        } else {
            ini_set('display_errors', 0);
            error_reporting(0);
        }
    }


}
