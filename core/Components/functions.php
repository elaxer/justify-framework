<?php

use Core\Components\Dump;
use Core\Components\Lang;

if (!function_exists('dump')) {
    function dump(...$variables)
    {
        Dump::dump(...$variables);
    }
}

if (!function_exists('dd')) {
    function dd(...$variables)
    {
        Dump::dd(...$variables);
    }
}

if (!function_exists('consoleLog')) {
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
}

if (!function_exists('consoleLogArray')) {
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
}

if (!function_exists('lang')) {
    function lang(string $key, $locale = null, string $notFound = 'NOT FOUND'): string
    {
        return Lang::get($key, $locale, $notFound);
    }
}

if (!function_exists('lang_get')) {
    function lang_get(string $key, $locale = null, string $notFound = 'NOT FOUND')
    {
        return Lang::get($key, $locale, $notFound);
    }
}

if (!function_exists('lang_setLocale')) {
    function lang_setLocale(string $locale)
    {
        Lang::setLocale($locale);
    }
}

if (!function_exists('lang_setFallbackLocale')) {
    function lang_setFallbackLocale(string $locale)
    {
        Lang::setFallbackLocale($locale);
    }
}

if (!function_exists('generatePassword')) {
    /**
     * Function returns generated password
     *
     * @param integer $length length of password
     * @param array $rules chars of future password
     * @return string
     */
    function generatePassword(int $length, array $rules = [
        'littleLetters' => true,
        'bigLetters' => true,
        'numbers' => true,
        'specialChars' => false
    ]): string
    {
        return \Core\Components\Password::generate($length, $rules);
    }
}

if (!function_exists('render')) {
    function render(string $view, array $params = []): string
    {
        return \Core\Components\Mvc\View::render($view, $params);
    }
}

if (!function_exists('assets')) {
    function assets()
    {
        return '/public/assets';
    }
}

if (!function_exists('cache')) {
    function get_cache()
    {
        $cachingConfig = \Core\Justify::$settings['caching'];
        $driver = $cachingConfig['driver'];

        return \Core\Components\Caching\CachingFactory::create($driver, $cachingConfig[$driver]);
    }
}
