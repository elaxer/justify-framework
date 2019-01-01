<?php

namespace Core\Exceptions;

/**
 * Class ExtensionNotFoundException
 *
 * Use this class then PHP extension not found
 *
 * @package Justify\Exceptions
 */
class ExtensionNotFoundException extends JustifyException
{
    /**
     * @inheritdoc
     */
    public function getName()
    {
        return 'Extension Not Found Exception';
    }


    public function __construct($extension)
    {
        $message = "Extension $extension doesn't exist";

        parent::__construct($message);
    }
}
