<?php

namespace Core\Exceptions;

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
     * @inheritdoc
     */
    public function getName()
    {
        return 'Invalid configuration exception';
    }
}
