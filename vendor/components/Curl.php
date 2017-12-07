<?php

namespace Justify\Components;

use Justify\Exceptions\ExtensionNotFoundException;

class Curl
{
    public $ch;

    public function __construct($url)
    {
        try {
            if (!function_exists('curl_init')) {
                throw new ExtensionNotFoundException('CURL');
            }

            $this->ch = curl_init($url);
        } catch (ExtensionNotFoundException $e) {
            $e->printError();
            exit();
        }
    }

    public function setOpts($opts) {
        foreach ($opts as $param => $value) {
            curl_setopt($this->ch, $param, $value);
        }
    }

    public function close()
    {
        curl_close($this->ch);
    }

    public function createFile($file, $mime, $baseName)
    {
        return curl_file_create($file, $mime, $baseName);
    }

    public static function getVersion()
    {
        return curl_version()['version'];
    }

    public function getError()
    {
        return curl_error($this->ch);
    }

    public function getErrno()
    {
        return curl_errno($this->ch);
    }

    public function exec()
    {
        return curl_exec($this->ch);
    }
}
