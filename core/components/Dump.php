<?php

namespace Justify\Components;

class Dump
{
    /**
     * Dumps variable
     *
     * @since 2.3
     * @param mixed $variables dump variable
     */
    public static function dump(...$variables)
    {
        foreach ($variables as $variable) {
            echo '<pre>';
            print_r($variable);
            echo '</pre>';
        }
    }

    /**
     * Dumps variable and die
     *
     * @since 2.3
     * @param mixed $variables dump variable
     */
    public static function dd(...$variables)
    {
        dump(...$variables);
        die();
    }
}
