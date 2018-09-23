<?php

use Justify\Components\Dump;

if (!function_exists('dump')) {
    function dump(...$variables)
    {
        Dump::dump(...$variables);
    }
}

if (!function_exists('dd')) {
    function dd(...$variables)
    {
        Dump::dd(...$variables);
    }
}
