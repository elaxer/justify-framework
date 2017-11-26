<?php

namespace Justify\Exceptions;

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
}
