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
        echo '<b>' . $this->getName() . ': </b>';
        echo $this->getMessage();
        echo ', in file: ' . '<b>' . $this->getFile() . '</b>';
        echo ' on line ' . '<b>' . $this->getLine() . '</b>';
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

    public function __construct($message = "", $code = 0, Throwable $previous = null)
    {
        if (!Justify::$debug) {
            exit();
        }

        parent::__construct($message, $code, $previous);
    }
}
