<?php

namespace Justify\Exceptions;

/**
 * Class InvalidArgumentException
 *
 * Throw this exception then method or function gets
 * invalid arguments
 *
 * @package Justify\Exceptions
 */
class InvalidArgumentException extends JustifyException
{
    /**
     * Returns name of exception
     *
     * @return string
     */
    public function getName()
    {
        return 'Invalid Argument Exception';
    }

    /**
     * InvalidArgumentException constructor
     *
     * Construct message of exception
     *
     * @param string $validType necessary type of variable
     * @param int $givenType given type of variable
     */
    public function __construct($validType, $givenType)
    {
        $message = "Need a $validType, but given $givenType";

        parent::__construct($message);
    }

}
