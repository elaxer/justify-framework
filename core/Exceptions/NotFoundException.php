<?php

namespace Core\Exceptions;

use Core\Justify;

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
        http_response_code(404);


    }
}
