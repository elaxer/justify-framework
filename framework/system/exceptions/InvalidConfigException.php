<?php

namespace Justify\Exceptions;

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
