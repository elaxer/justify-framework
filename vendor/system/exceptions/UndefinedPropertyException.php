<?php

namespace Justify\Exceptions;

/**
 * Class UndefinedPropertyException
 *
 * Exception calls then calls undefined property
 *
 * @package Justify\Exceptions
 */
class UndefinedPropertyException extends JustifyException
{
    /**
     * @inheritdoc
     */
    public function getName()
    {
        return 'Undefined Property Exception';
    }
}
