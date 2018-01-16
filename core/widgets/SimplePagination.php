<?php

namespace Justify\Widgets;

use Justify\Components\SimplePagination as SimplePaginationObject;

class SimplePagination
{
    /**
     * Displays pagination widget
     *
     * @since 1.6
     * @param SimplePaginationObject $pagination pagination
     * @param string $previous text of previous button
     * @param string $next text of next button
     * @return string
     */
    public static function render(SimplePaginationObject $pagination, $previous = 'Previous', $next = 'Next')
    {
        ob_start();

        require_once BASE_DIR . '/core/widgets/templates/simple_pagination.php';
        $content = ob_get_contents();

        ob_end_clean();
        return $content;
    }
}
