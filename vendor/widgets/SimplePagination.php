<?php

namespace Justify\Widgets;

use Justify\Components\SimplePagination as SimplePag;

class SimplePagination
{
    /**
     * Displays pagination widget
     *
     * @since 1.6
     * @param SimplePag $pagination pagination
     * @return string
     */
    public static function render(SimplePag $pagination, $previous = 'Previous', $next = 'Next')
    {
        ob_start();

        require_once BASE_DIR . '/vendor/widgets/templates/simple_pagination.php';
        $content = ob_get_contents();

        ob_end_clean();
        return $content;
    }
}
