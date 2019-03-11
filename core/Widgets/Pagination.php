<?php

namespace Core\Widgets;

use Core\Components\Mvc\View;
use Core\Components\Pagination\Pagination as PaginationObject;

class Pagination
{
    /**
     * Displays pagination widget
     *
     * @since 1.6
     * @param PaginationObject $pagination pagination
     * @return string
     */
    public static function render($pagination)
    {
        //todo: edit
        return View::renderWidget(lcfirst(__CLASS__));
    }
}
