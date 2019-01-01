<?php

namespace Core\Exceptions;

/**
 * Class FileNotExistException
 *
 * Throw this exception then file not exists
 *
 * @package Justify\Exceptions
 */
class FileNotExistException extends JustifyException
{
    /**
     * @inheritdoc
     */
    public function getName()
    {
        return 'File not exist exception';
    }

    /**
     * FileNotExistException constructor
     *
     * @param string $what type of file
     * @param int $file path to file
     */
    public function __construct($what, $file)
    {
        $message = "$what $file doesn't exist";

        parent::__construct($message);
    }
}
