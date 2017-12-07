<?php

namespace Justify\Widgets;

use Justify\Components\Pagination as Pag;

class Pagination
{
    /**
     * Displays pagination widget
     *
     * @param Pag $pagination pagination
     * @return string
     */
    public static function render(Pag $pagination)
    {
        ob_start();

        require_once BASE_DIR . '/vendor/widgets/templates/pagination.php';
        $content = ob_get_contents();

        ob_end_clean();
        return $content;
    }
}
