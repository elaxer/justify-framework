<?php

namespace Core\Widgets;

class CSRFFiled
{
    public static function render(): string
    {
        $csrfToken = \Core\System\CSRF::$token;

        ob_start();

        require_once BASE_DIR . '/core/widgets/templates/csrf_field.php';

        $content = ob_get_contents();
        ob_end_clean();

        return $content;
    }
}
