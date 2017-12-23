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
class Controller extends BaseObject
{
    /**
     * Title of HTML file
     *
     * @var string
     */
    public $title = '';

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

    /**
     * Stores matches of preg_match function
     *
     * @var array
     */
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
        $uri = parse_url($_SERVER['REQUEST_URI']);
        return $uri['path'];
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
    protected function render(string $view, array $vars = [])
    {
        try {  
            extract($vars);

            $pathToTemplate = BASE_DIR . '/views/templates/' . $this->template . '/' . $this->template . '.php';
            $pathToContent = BASE_DIR . '/views/' . Justify::$controller . '/' . $view . $this->fileExtension;

            if (!file_exists($pathToTemplate)) {
                throw new FileNotExistException('Template', $pathToTemplate);
            }
            if (!file_exists($pathToContent)) {
                throw new FileNotExistException('View', $pathToContent);
            }

            ob_start();
            require_once $pathToContent;
            $content = ob_get_contents();
            ob_end_clean();

            ob_start();
            require_once $pathToTemplate;
            $page = ob_get_contents();
            ob_end_clean();

            return $page;
        } catch (FileNotExistException $e) {
            $e->printError();
        }
    }

    /**
     * Refresh current page
     *
     * @param integer|double $seconds seconds to wait
     */
    public function refresh(float $seconds = 0)
    {
        header("Refresh: $seconds");
    }

    /**
     * Redirect user to pointed address
     *
     * @param string $to path to redirect address
     */
    public function redirect(string $to)
    {
        header("Location: $to");
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
    public function __construct(array $matches = [])
    {
        if (!isset($this->template)) {
            $this->template = Justify::$settings['template'];
        }

        $this->matches = $matches;
    }
}
