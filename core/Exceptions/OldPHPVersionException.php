<?php

namespace Core\Exceptions;

/**
 * Class OldPHPVersionException
 *
 * Exception throws then PHP version less then Justify::$minimalPHPVersion
 *
 * @package Justify\Exceptions
 */
class OldPHPVersionException extends JustifyException
{
    /**
     * @inheritdoc
     */
    public function getName()
    {
        return 'Old PHP Version Exception';
    }
}
