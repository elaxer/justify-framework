<?php

namespace Justify\Components;

use Justify;

class Lang
{
    const LANG_DIR = BASE_DIR . '/lang/';

    public static $languages;

    public static $currentLang;

    public static function getLanguages()
    {
        $dirs = glob(self::LANG_DIR . '*');

        foreach ($dirs as $dir) {
            if (! is_dir($dir)) {
                continue;
            }

            $lang = basename($dir);
            $files = glob($dir . '/*');

            foreach ($files as $file) {
                if (! is_file($file)) {
                    continue;
                }

                $baseFilename = basename($file, '.php');
                self::$languages[$lang][$baseFilename] = require_once $file;
            }
        }
    }

    public static function get($key, $locale = null, $notFound = 'NOT FOUND')
    {
        if (! $locale) {
            $locale = Justify::$settings['locale'];
        }

        list($file, $key) = explode('.', $key);

        if (isset(self::$languages[$locale][$file][$key])) {
            return self::$languages[$locale][$file][$key];
        }

        $locale = Justify::$settings['fallbackLocale'];

        if (isset(self::$languages[$locale][$file][$key])) {
            return self::$languages[$locale][$file][$key];
        }

        return $notFound;
    }

    public static function setLocale($locale)
    {
        Justify::$settings['locale'] = $locale;
    }

    public static function setFallbackLocale($locale)
    {
        Justify::$settings['fallbackLocale'] = $locale;
    }
}
