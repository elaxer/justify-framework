<?php

namespace justify\framework\core\system;

/**
 * System abstract class Controller consists of methods for work with app controller
 *
 * @abstract
 */
abstract class Controller
{
    public $template;

    /**
     * Method returns current URI address
     *
     * @param bool $trim if trim true then remove unnecessary characters "/"
     * @access protected
     * @return string
     */
    protected function getURI($trim = true)
    {
        if ($trim === true) {
            return trim($_SERVER['REQUEST_URI'], '/');
        } else {
            return $_SERVER['REQUEST_URI'];
        }

    }

    /**
     * Method renders the html file
     *
     * Check HTML params in config/html.php
     *
     * @param string $view name of html file. Point name of html without expansion
     * @param array $vars stores the passed arguments in an associative array. Default current action name
     * @access public
     * @return bool
     */
    public function render($view = ACTION, $vars = array())
    {
        extract($vars);

        global $settings;

        $charset = $settings['html']['charset'];
        $lang = $settings['html']['lang'];

        if (!isset($title)) $title = $settings['html']['title'];
        if (!isset($description)) $description = $settings['html']['description'];
        if (!isset($author)) $author = $settings['html']['author'];
        if (!isset($keywords)) $keywords = $settings['html']['keywords'];

        define('HEAD', TEMPLATES_DIR . '/' . $this->template . '/head.php');
        define('HEADER', TEMPLATES_DIR . '/' . $this->template . '/header.php');
        define('CONTENT', VIEWS_DIR . '/' . ACTIVE_APP . '/' . $view . '.php');
        define('FOOTER', TEMPLATES_DIR . '/' . $this->template . '/footer.php');

        require_once TEMPLATES_DIR . '/' . $this->template . '/' . $this->template . '.php';

        return true;
    }

}
