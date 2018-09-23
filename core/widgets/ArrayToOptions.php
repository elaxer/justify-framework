<?php

namespace Core\Widgets;

/**
 * Class ArrayToOptions
 *
 * Render associative array as option tags
 *
 * @since 2.0
 * @package Core\Widgets
 */
class ArrayToOptions
{
    public static function render(array $array, int $selected = 1): string
    {
        ob_start();

        require_once BASE_DIR . '/core/widgets/templates/options.php';

        $content = ob_get_contents();
        ob_end_clean();

        return $content;
    }
}
