<?php

namespace justify\framework\system;

/**
 * System abstract class Controller consists of methods for work with app controller
 *
 * @abstract
 */
abstract class Controller
{
    /**
     * Stores name of renders template
     * 
     * @access protected
     * @var string
     */
    protected $template;

    /**
     * Stores files extension
     * 
     * Default value in config/settings.php
     * 
     * @var string
     */
    protected $fileExtension;

    /**
     * Method returns current URI address
     * without GET query
     *
     * @param bool $trim if trim true then remove unnecessary characters "/"
     * @access protected
     * @return string
     */
    protected function getURI()
    {
        if (!isset($_SERVER['REDIRECT_URL'])) {
            $_SERVER['REDIRECT_URL'] = '';
        }
        
        return trim($_SERVER['REDIRECT_URL'], '/');
    }

    /**
     * Method renders the html file
     *
     * Check HTML params in config/html.php
     *
     * $title HTML title. Default in config/html.php
     * $description HTML meta tag with name description. Default in config/html.php
     * $author HTML meta tag with name author. Default in config/html.php
     * $keywords HTML meta tag with name keywords. Default in config/html.php
     * 
     * @param string $view name of html file. Point name of html without expansion
     * @param array $vars stores the passed arguments in an associative array. Default current action name
     * @access protected
     * @return string
     */
    protected function render($view = ACTION, $vars = [])
    {
        ob_start();

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

        require_once TEMPLATES_DIR . '/' . $this->template . '/' . $this->template . $this->fileExtension;

        $content = ob_get_contents();
        ob_end_clean();

        return $content;
    }

    public function __construct()
    {
        global $settings;
        if (!isset($this->template)) { 
            $this->template = $settings['template'];
        }
        if (!isset($this->fileExtension)) {
            $this->fileExtension = $settings['fileExtension'];
        }
    }

}
