<?php

namespace Justify\Exceptions;

class CauseFromConsoleException extends JustifyException
{
    /**
     * @inheritdoc
     */
    public function getName()
    {
        return 'Cause From Console Exception';
    }
}
