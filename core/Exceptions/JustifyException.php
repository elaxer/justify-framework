<?php

namespace Core\Exceptions;

use Core\Justify;
use Throwable;

/**
 * Class JustifyException
 *
 * Base class of exceptions
 *
 * @package Justify\Exceptions
 */
class JustifyException extends \Exception
{
    /**
     * Returns name of exception
     *
     * @return string
     */
    public function getName()
    {
        return 'Justify Exception';
    }

    public function __construct($message = '', $code = 0, Throwable $previous = null)
    {
        if (config('debug')) {
            exit();
        }

        parent::__construct($message, $code, $previous);
    }
}
