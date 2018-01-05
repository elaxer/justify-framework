<?php

namespace Justify\Widgets;

/**
 * Class Breadcrumbs
 *
 * Use this class to display breadcrumbs widget
 *
 * @since 1.6
 * @package Justify\Components
 */
class Breadcrumbs
{
    /**
     * Displays breadcrumbs widget
     *
     * @param array $breadcrumbs. Key - item, value - link
     * @return string
     */
    public static function render($breadcrumbs = [])
    {
        ob_start();

        require_once BASE_DIR . '/vendor/widgets/templates/breadcrumbs.php';

        $content = ob_get_contents();
        ob_end_clean();

        return $content;
    }
}
