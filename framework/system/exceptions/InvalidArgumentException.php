<?php

namespace Justify\Exceptions;

class InvalidArgumentException extends JustifyException
{
    public function getName()
    {
        return 'Invalid Argument Exception';
    }

    public function __construct($validType, $givenType)
    {
        $message = "Need a $validType, but given $givenType";

        parent::__construct($message);
    }

}
