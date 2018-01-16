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
     * @var string
     */
    public $template;

    /**
     * Stores files extension
     *
     * Default value in config/settings.php
     *
     * @var string
     */
    private $fileExtension = '.php';

    /**
     * Stores matches of preg_match function
     *
     * @var array
     */
    public $matches;

    /**
     * Request object
     *
     * See class vendor/system/Request.php
     *
     * @since 2.0
     * @var object
     */
    public $request;

    /**
     * Method renders the html file
     *
     * Check HTML params in config/html.php
     *
     * @param string $view name of html file. Point name of html without expansion
     * @param array $vars stores the passed arguments in an associative array. Default current action name
     * @return string
     */
    public function render(string $view, array $vars = [])
    {
        try {
            extract($vars);

            $pathToTemplate = BASE_DIR . '/views/templates/' . $this->template . '/' . $this->template . '.php';
            $pathToContent = BASE_DIR . '/views/' . Justify::$controller . '/' . $view . $this->fileExtension;

            if (! file_exists($pathToTemplate)) {
                throw new FileNotExistException('Template', $pathToTemplate);
            }
            if (! file_exists($pathToContent)) {
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
     * Method returns current URI address
     *
     * @return string
     */
    public function getURI()
    {
        return parse_url($_SERVER['REQUEST_URI'])['path'];
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
     * Redirect user on previous page
     *
     * @since 2.0
     */
    public function goBack()
    {
        header("Location: {$_SERVER['HTTP_REFERER']}");
    }

    /**
     * Redirects to home page
     *
     * Home page value specified in file config/settings.php in directive "homeUrl"
     *
     * @since 2.0
     */
    public function goHome()
    {
        header('Location: ' . Justify::$home);
    }

    /**
     * Controller constructor
     *
     * Sets default name of template if template equals false
     *
     * Default value of file extension and template you can find
     * in config/settings.php
     *
     * @param array $matches matches of preg_match function
     */
    public function __construct(array $matches = [])
    {
        if (! isset($this->template)) {
            $this->template = Justify::$settings['template'];
        }

        $this->request = new Request();
        $this->matches = $matches;
    }
}
