<?php

namespace Core\Widgets;

use Core\Components\Http\CSRF;

class CSRFFiled
{
    public static function render()
    {
        $csrfToken = CSRF::$token;

        ob_start();

        require_once BASE_DIR . '/core/widgets/templates/csrf_field.php';

        $content = ob_get_contents();
        ob_end_clean();

        return $content;
    }
}
