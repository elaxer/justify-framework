<?php

namespace Justify\Components;

class Date
{
    /**
     * Method converts month number to russian string in genitive case
     *
     * @param integer $month month number
     * @return string|bool
     */
    public static function russianMonth($month)
    {
        $months = [
            1 => 'января', 2 => 'февраля', 3 => 'марта',
            4 => 'апреля', 5 => 'мая', 6 => 'июня',
            7 => 'июля', 8 => 'августа', 9 => 'сентября',
            10 => 'октября', 11 => 'ноября', 12 => 'декабря'
        ];

        return array_key_exists($month, $months) ? $months[$month] : false;
    }
}
