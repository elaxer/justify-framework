<?php

namespace framework\core\system;

use QE;

abstract class Controller
{
    protected function getURI($trim = true)
    {
        if ($trim === true) {
            return trim($_SERVER['REQUEST_URI'], '/');
        } else {
            return $_SERVER['REQUEST_URI'];
        }

    }

    public function render($view, $vars = array())
    {
        extract($vars);
        $settings = require BASE_DIR . '/config/settings.php';

        $charset = $settings['html']['charset'];
        $lang = $settings['html']['lang'];

        if ($settings['html']['replace_by_default']) {
            if (!isset($title)) $title = $settings['html']['title'];
            if (!isset($description)) $description = $settings['html']['description'];
            if (!isset($author)) $author = $settings['html']['author'];
            if (!isset($keywords)) $keywords = $settings['html']['keywords'];
        }

        require_once BASE_DIR . '/templates/layouts/main.php';
        return true;
    }

}
