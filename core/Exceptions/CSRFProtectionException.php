<?php

namespace Core\Exceptions;

use Throwable;

class CSRFProtectionException extends JustifyException
{
    public function getName()
    {
        return 'Missed CSRF token param';
    }

    public function __construct($message = '', $responseCode = 500, $code = 0, Throwable $previous = null)
    {
        parent::__construct($message, $responseCode, $code, $previous);
    }
}
