<?php
function encode($var, $stripTags = false)
{
    if ($stripTags)
        return htmlspecialchars(trim(strip_tags($var)));
    return htmlspecialchars(trim($var));
}
