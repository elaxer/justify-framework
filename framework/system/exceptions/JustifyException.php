<?php

namespace Justify\Exceptions;

use Exception;

class JustifyException extends Exception
{
    public function printError()
    {
        echo '<b>' . $this->getName() . ': </b>';
        echo $this->getMessage();
        echo ', <b>file:</b> ' . $this->getFile();
        echo ' in line ' . '<b>' . $this->getLine() . '</b>';
    }

    public function getName()
    {
        return 'Justify Exception';
    }
}
