<?php

namespace Justify\System;

use Justify;

/**
 * System abstract class Controller consists of methods for work with app controller
 */
class Controller
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
    protected function render($view, $vars = [])
    {
        ob_start();

        extract($vars);

        $content = VIEWS_DIR . '/' . Justify::$app . '/' . $view . '.php';

        require_once TEMPLATES_DIR . '/' . $this->template . '/' . $this->template . $this->fileExtension;

        $page = ob_get_contents();
        ob_end_clean();

        return $page;
    }

    /**
     * Controller constructor
     * 
     * Sets default name of template if template equals false
     * Sets default name of file extension if file extension equals false
     * 
     * Default value of file extension and temaplate you can fidn
     * in config/settings.php
     * 
     * @access public
     */
    public function __construct()
    {
        if (!isset($this->template)) { 
            $this->template = Justify::$settings['template'];
        }

        if (!isset($this->fileExtension)) {
            $this->fileExtension = Justify::$settings['fileExtension'];
        }
    }

}
