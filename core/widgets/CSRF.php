<?php

namespace Justify\Widgets;

class CSRF
{
    public static function field()
    {
        $csrfToken = \Justify\System\CSRF::$token;

        ob_start();

        require_once BASE_DIR . '/core/widgets/templates/csrf_field.php';

        $content = ob_get_contents();
        ob_end_clean();

        return $content;
    }
}
