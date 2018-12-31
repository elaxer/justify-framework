<?php

/**
 * Print text for browser console
 *
 * @since 2.2.0
 * @param string $text
 */
function consoleLog(string $text)
{
    echo "<script>console.log('$text')</script>";
}

/**
 * Print text for browser console
 *
 * @since 2.2.0
 * @param array $array
 */
function consoleLogArray(array $array)
{
    echo '<script>';
    foreach ($array as $value) {
        echo "console.log('$value')\n";
    }
    echo '</script>';
}
