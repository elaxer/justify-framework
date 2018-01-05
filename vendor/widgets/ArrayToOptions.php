<?php

namespace Justify\Widgets;

/**
 * Class ArrayToOptions
 *
 * Render associative array as option tags
 *
 * @since 2.0
 * @package Justify\Widgets
 */
class ArrayToOptions
{
    public static function render($array, $selected = 1)
    {
        ob_start();

        require_once BASE_DIR . '/vendor/widgets/templates/options.php';

        $content = ob_get_contents();
        ob_end_clean();

        return $content;
    }
}
