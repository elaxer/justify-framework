<?php
/**
 * Function displays variable in beautiful and understandable view
 *
 * @return void
 * @param mixed $variable
 * @param bool $exit if $exit true then after use this function the script will stop working
 * @param bool|string $text if $text string then after use this function the script will stop working with the message
 */
function dump($variable, $exit = false, $text = '')
{
    echo '<pre>';
    var_dump($variable);
    echo '</pre>';

    if ($exit) {
        die($text);
    }
}
