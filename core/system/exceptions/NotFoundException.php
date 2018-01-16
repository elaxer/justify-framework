<?php

namespace Justify\Exceptions;

use Justify;

/**
 * Class NotFoundException
 *
 * Throw this exception then page not found
 *
 * @package Justify\Exceptions
 */
class NotFoundException extends JustifyException
{
    /**
     * @inheritdoc
     */
    public function getName()
    {
        return 'Page not found Exception';
    }

    /**
     * Constructor of class PageNotFoundException
     *
     * @param string $message message about error
     * @access public
     */
    public function __construct(string $message)
    {
        parent::__construct($message, 404);

        $this->render($message);
    }

    /**
     * Renders 404 page
     *
     * Method includes 404 page if URI doesn't match with route
     * or throws exception
     *
     * @param string $message message about error
     */
    public function render(string $message)
    {
        Justify::$controller = 'No';
        Justify::$action = 'No';

        $pathToContent = BASE_DIR . '/views/errors/' . Justify::$settings['404page'];
        $pathToTemplate = BASE_DIR . '/views/templates/' . Justify::$settings['template'] . '/' . Justify::$settings['template'] . '.php';

        ob_start();
        require_once $pathToContent;
        $content = ob_get_contents();
        ob_end_clean();

        ob_start();
        require_once $pathToTemplate;
        $template = ob_get_contents();
        ob_end_clean();

        echo $template;
    }
}
