<?php
function autoload($className)
{
    $path = BASE_DIR . '/' . $className . '.php';
    $path = str_replace('\\', '/', $path);
    require_once $path;
}
spl_autoload_register('autoload');