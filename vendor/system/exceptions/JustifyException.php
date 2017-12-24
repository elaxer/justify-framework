<?php

namespace Justify\Exceptions;

use Justify;
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
     * Prints error if threw exception
     */
    public function printError()
    {
        require_once BASE_DIR . '/vendor/system/templates/exception.php';
    }

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
        if (!Justify::$settings['debug']) {
            exit();
        }

        parent::__construct($message, $code, $previous);
    }
}
