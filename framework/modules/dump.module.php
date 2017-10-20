<?php
/**
 * Function displays variable in beautiful and understandable view
 *
 * @return void
 * @param mixed $variable
 * @param bool $exit if $exit true then after use this function the script will stop working
 */
function dump($variable, $exit = false)
{
    echo '<pre>';
    var_dump($variable);
    echo '</pre>';

    if ($exit) {
        exit;
    }
}
