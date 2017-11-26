<?php

namespace Justify\Exceptions;

class OldPHPVersionException extends JustifyException
{
    /**
     * Returns name of exception
     *
     * @return string
     */
    public function getName()
    {
        return 'Old PHP Version Exception';
    }
}