<?php

namespace Justify\Exceptions;

/**
 * Class InvalidConfigException
 *
 * Throw this exception then gets invalid configuration
 *
 * @package Justify\Exceptions
 */
class InvalidConfigException extends JustifyException
{
    /**
     * Returns name of exception
     *
     * @return string
     */
    public function getName()
    {
        return 'Invalid configuration exception';
    }

    /**
     * InvalidConfigException constructor
     *
     * @param string $message
     */
    public function __construct($message)
    {
        parent::__construct($message);
    }
}
