<?php

namespace Justify\Modules;

use Justify\Exceptions\InvalidArgumentException;

class Date
{
    /**
     * Method converts month number to russian string in genitive case
     *
     * @param integer $month month number
     * @throws InvalidArgumentException if month is't integer
     * @return string
     */
    public static function russianMonth($month)
    {
        try {
            if (!is_integer($month)) {
                throw new InvalidArgumentException('integer', gettype($month));
            }

            $months = [
                1 => 'января', 2 => 'февраля', 3 => 'марта',
                4 => 'апреля', 5 => 'мая', 6 => 'июня',
                7 => 'июля', 8 => 'августа', 9 => 'сентября',
                10 => 'октября', 11 => 'ноября', 12 => 'декабря'
            ];

            if (array_key_exists($month, $months)) {
                return $months[$month];
            }

            return false;
        } catch (InvalidArgumentException $e) {
            $e->printError();
        }
    }
}
