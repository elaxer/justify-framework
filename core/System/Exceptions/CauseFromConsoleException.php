<?php

namespace Core\System\Exceptions;

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
