<?php

namespace Justify\Exceptions;

use Exception;

class JustifyException extends Exception
{
    public function printError()
    {
        echo '<b>' . $this->getName() . ': </b>';
        echo $this->getMessage();
        echo ', in file: ' . '<b>' . $this->getFile() . '</b>';
        echo ' on line ' . '<b>' . $this->getLine() . '</b>';
    }

    public function getName()
    {
        return 'Justify Exception';
    }
}
