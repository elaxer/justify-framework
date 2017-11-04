<?php

namespace justify\modules;

/**
 * Function displays variable in beautiful and understandable view
 *
 * @param mixed $variable
 * @param bool $exit if $exit true then after use this function the script will stop working
 * @return void
 */
function dump($variable, $exit = false)
{
    echo '<pre>';
    print_r($variable);
    echo '</pre>';

    if ($exit) {
        exit;
    }
}

/**
 * Function displays $GLOBALS variable
 * 
 * @return void
 */
function globals()
{
	dump($GLOBALS);
}

/**
 * Function displays $_REQUEST variable
 * 
 * @return void
 */
function request()
{
	dump($_REQUEST);
}

/**
 * Function displays $_GET variable
 * 
 * @return void
 */
function get()
{
	dump($_GET);
}

/**
 * Function displays $_POST variable
 * 
 * @return void
 */
function post()
{
	dump($_POST);
}

/**
 * Function displays $_SERVER variable
 * 
 * @return void
 */
function server()
{
	dump($_SERVER);
}

/**
 * Function displays $_COOKIE variable
 * 
 * @return void
 */
function cookie()
{
	dump($_COOKIE);
}

/**
 * Function displays $_SESSION variable
 * 
 * @return void
 */
function session()
{
	dump($_SESSION);
}

/**
 * Function displays $_FILES variable
 * 
 * @return void
 */
function files()
{
	dump($_FILES);
}
