<?php

if (! function_exists('dump')) {
    /**
     * Dumps variable
     *
     * @since 2.2
     * @param mixed $variable dump variable
     */
    function dump($variable)
    {
        echo '<pre>';
        print_r($variable);
        echo '</pre>';
    }
}

/**
 * Dumps variable and die
 *
 * @since 2.0
 * @param mixed $variable dump variable
 * @param string $message message attribute for operator die()
 */
function dd($variable, $message = '')
{
    dump($variable);
    die($message);
}

/**
 * Function displays $GLOBALS variable
 */
function globals()
{
    dump($GLOBALS);
}

/**
 * Function displays $_REQUEST variable
 */
function request()
{
    dump($_REQUEST);
}

/**
 * Function displays $_GET variable
 */
function get()
{
    dump($_GET);
}

/**
 * Function displays $_POST variable
 */
function post()
{
    dump($_POST);
}

/**
 * Function displays $_SERVER variable
 */
function server()
{
    dump($_SERVER);
}

/**
 * Function displays $_COOKIE variable
 */
function cookie()
{
    dump($_COOKIE);
}

/**
 * Function displays $_SESSION variable
 */
function session()
{
    dump($_SESSION);
}

/**
 * Function displays $_FILES variable
 */
function files()
{
    dump($_FILES);
}
