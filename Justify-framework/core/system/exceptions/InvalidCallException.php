<?php

namespace Justify\Exceptions;

/**
 * Class InvalidCallException
 *
 * Exception calls then calls undefined method
 *
 * @package Justify\Exceptions
 */
class InvalidCallException extends JustifyException
{
    /**
     * @inheritdoc
     */
    public function getName()
    {
        return 'Invalid Call exception';
    }
}
