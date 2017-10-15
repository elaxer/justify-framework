<?php

namespace justify\framework\core;

class Router
{
    private $uriExists;

    public function run()
    {
        global $settings;

        $this->settingsHandler();
        $this->uriExists = false;

        foreach ($settings['apps'] as $app) {
            $urls = require_once APPS_DIR . '/' . $app . '/urls.php';

            foreach ($urls as $pattern => $action) {
                if (preg_match("~$pattern~", $this->getURI(), $matches)) {
                    define('ACTIVE_APP', $app);
                    define('ACTION', $action);

                    $this->uriExists = true;

                    if (is_array($action)) {
                        define('ACTION_NAME', 'URL rendering');

                        $controllerName = 'justify\\apps\\' . $app . '\\' . ucfirst($app) . 'Controller';

                        $controller = new $controllerName;
                        if (!isset($controller->template)) {
                            $controller->template = $settings['template'];
                        }
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
        }

        if ($this->uriExists === false) {
            define('ACTION_NAME', 'Null');
            define('ACTIVE_APP', 'Null');
            $this->error404();
        }
    }

    private function settingsHandler()
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

    private function getURI()
    {
        return trim($_SERVER['REQUEST_URI'], '/');
    }

    private function error404()
    {
        global $settings;
        define('HEAD', TEMPLATES_DIR . '/' . $settings['template'] . '/head.php');
        define('HEADER', TEMPLATES_DIR . '/' . $settings['template'] . '/header.php');
        define('FOOTER', TEMPLATES_DIR . '/' . $settings['template'] . '/footer.php');
        require_once VIEWS_DIR . '/' . $settings['404page'];
    }
}
