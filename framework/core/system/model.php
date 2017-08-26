<?php

class Model
{
    protected static function connect($die = false)
    {
        $settings = require_once BASE_DIR . '/settings.php';
        $connection = mysqli_connect($settings['db']['host'], $settings['db']['user'], $settings['db']['password'], $settings['db']['name']);
        if ($connection) {
            if ($settings['db']['charset']) {
                mysqli_set_charset($connection, $settings['db']['charset']);
            }
            return $connection;
        } else if ($die) {
            die($die);
        }
    }

    protected static function disconnect()
    {
        mysqli_close(self::connect());
    }

}