<?php

namespace Justify\Exceptions;

use Justify;

class NotFoundException extends JustifyException
{
    /**
     * Returns name of exception
     *
     * @return string
     */
    public function getName()
    {
        return 'Page not found Exception';
    }

    /**
     * Constructor of class PageNotFoundException
     *
     * Method includes 404 page if URI doesn't match with route
     * or throws exception
     *
     * @param string $message message about error
     * @param string $title title of 404 page
     * @access public
     */
    public function __construct($message, $title = '')
    {
        parent::__construct($message);

        Justify::$app = 'No';
        Justify::$action = 'No';

        $content = VIEWS_DIR . '/' . Justify::$settings['404page'];

        require_once TEMPLATES_DIR . '/' . Justify::$settings['template'] . '/' . Justify::$settings['template'] . '.php';
    }
}