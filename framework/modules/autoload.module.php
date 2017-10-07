<?php
//Autoload function
function autoload($className)
{
	$className = preg_replace('#justify#', '', $className);
    $path = BASE_DIR . '/' . $className . '.php';
    $path = str_replace('\\', '/', $path);

    require_once $path;
}
spl_autoload_register('autoload');
