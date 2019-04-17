<?php

namespace Core\Exceptions;

/**
 * Class NotFoundException
 *
 * Throw this exception when page not found
 *
 * @package Justify\Exceptions
 */
class NotFoundException extends JustifyException
{
    const HTTP_NOT_FOUND = 404;
    /**
     * @inheritdoc
     */
    public function getName()
    {
        return 'Page not found Exception';
    }

    /**
     * @param string $message message about error
     * @param array $params params to view
     * @access public
     */
    public function __construct($message = '', array $params = [])
    {
        error(self::HTTP_NOT_FOUND, $params);
        parent::__construct($message);
    }
}
