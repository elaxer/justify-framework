<?php

namespace Justify\System;

use Justify;
use Justify\Exceptions\FileNotExistException;

/**
 * Class Controller
 *
 * System class Controller consists of methods for work with app controller
 *
 * @package Justify\System
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
    protected $fileExtension = '.php';

    protected $matches;

    /**
     * Method returns current URI address
     * without GET query
     *
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
     * @param string $view name of html file. Point name of html without expansion
     * @param array $vars stores the passed arguments in an associative array. Default current action name
     * @access protected
     * @return string
     */
    protected function render($view, array $vars = [])
    {
        try {
            ob_start();

            extract($vars);

            $template = TEMPLATES_DIR . '/' . $this->template . '/' . $this->template . '.php';
            $content = VIEWS_DIR . '/' . Justify::$app . '/' . $view . $this->fileExtension;

            if (!file_exists($template)) {
                throw new FileNotExistException('Template', $template);
            }
            if (!file_exists($content)) {
                throw new FileNotExistException('View file', $content);
            }

            require_once $template;

            $page = ob_get_contents();
            ob_end_clean();

            return $page;

        } catch (FileNotExistException $e) {
            $e->printError();
        }
    }

    /**
     * Controller constructor
     *
     * Sets default name of template if template equals false
     *
     * Default value of file extension and template you can find
     * in config/settings.php
     *
     * @param array $matches
     * @access public
     */
    public function __construct($matches = [])
    {
        if (!isset($this->template)) {
            $this->template = Justify::$settings['template'];
        }

        $this->matches = $matches;
    }
}
