<?php

namespace Justify\Components;

class Dump
{
    /**
     * Method displays variable in beautiful and understandable view
     *
     * @param mixed $variable
     * @param bool $exit if $exit true then after use this function the script will stop working
     * @return void
     */
    public static function dump($variable, $exit = false)
    {
        echo '<pre>';
        print_r($variable);
        echo '</pre>';

        if ($exit) {
            exit();
        }
    }

    /**
     * Method displays $GLOBALS variable
     *
     * @return void
     */
    public static function globals()
    {
        Dump::dump($GLOBALS);
    }

    /**
     * Method displays $_REQUEST variable
     *
     * @return void
     */
    public static function request()
    {
        Dump::dump($_REQUEST);
    }

    /**
     * Method displays $_GET variable
     *
     * @return void
     */
    public static function get()
    {
        Dump::dump($_GET);
    }

    /**
     * Method displays $_POST variable
     *
     * @return void
     */
    public static function post()
    {
        Dump::dump($_POST);
    }

    /**
     * Method displays $_SERVER variable
     *
     * @return void
     */
    public static function server()
    {
        Dump::dump($_SERVER);
    }

    /**
     * Method displays $_COOKIE variable
     *
     * @return void
     */
    function cookie()
    {
        Dump::dump($_COOKIE);
    }

    /**
     * Method displays $_SESSION variable
     *
     * @return void
     */
    public static function session()
    {
        Dump::dump($_SESSION);
    }

    /**
     * Method displays $_FILES variable
     *
     * @return void
     */
    public static function files()
    {
        Dump::dump($_FILES);
    }
}
