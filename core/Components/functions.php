<?php

use Core\Justify;
use Core\Components\Dump;
use Core\Components\Lang;
use Core\Components\Str;

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
    function consoleLog($text)
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

if (!function_exists('_')) {
    function _($key, $locale = null, $notFound = 'NOT FOUND')
    {
        return Lang::get($key, $locale, $notFound);
    }
}

if (!function_exists('lang_setLocale')) {
    function lang_setLocale($locale)
    {
        Lang::setLocale($locale);
    }
}

if (!function_exists('lang_setFallbackLocale')) {
    function lang_setFallbackLocale($locale)
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
    function generatePassword($length, array $rules = [
        'lowerCase' => true,
        'upperCase' => true,
        'digits' => true,
        'specialChars' => false
    ])
    {
        return \Core\Components\Password::generate($length, $rules);
    }
}

if (!function_exists('render')) {
    /**
     * @param string $view
     * @param array $params
     * @return string
     */
    function render($view, array $params = [])
    {
        return \Core\Components\Mvc\View::render($view, $params);
    }
}

if (!function_exists('assets')) {
    /**
     * @return string
     */
    function assets()
    {
        return '/public/assets';
    }
}

if (!function_exists('config')) {
    /**
     * @param string $option option of config
     *
     * @return \Core\Components\Config
     */
    function config($option = '')
    {
        if ($option) {
            return Justify::$app->container->get('config')->get($option);
        }

        return Justify::$app->container->get('config');
    }
}

if (!function_exists('cache')) {
    /**
     * @return \Core\Components\Caching\Cache
     */
    function cache()
    {
        return Justify::$app->container->get('cache');
    }
}

if (!function_exists('request')) {
    /**
     * @return \Core\Components\Http\Request
     */
    function request()
    {
        return Justify::$app->container->get('request');
    }
}

if (!function_exists('response')) {
    /**
     * @return \Core\Components\Http\Response
     */
    function response()
    {
        return Justify::$app->container->get('response');
    }
}

if (!function_exists('session')) {
    /**
     * @return \Core\Components\Http\Session
     */
    function session()
    {
        return Justify::$app->container->get('session');
    }
}

if (!function_exists('router')) {
    /**
     * @return \Core\Components\Router\Router
     */
    function router()
    {
        return Justify::$app->container->get('router');
    }
}

if (!function_exists('str_random')) {
    function str_random($length = 16, $chars = 'qwertyuiopasdfghjklzxcvbnmQWERTYUIOPASDFGHJKLZXCVBNM1234567890')
    {
        return Str::random($length, $chars);
    }
}

if (!function_exists('str_shorten')) {
    function str_shorten($text, $limit, $postfix = '...')
    {
        return Str::shorten($text, $limit, $postfix);
    }
}

if (!function_exists('str_wordCensor')) {
    function str_wordCensor($string, array $disallowed, $censor = '')
    {
        return Str::wordCensor($string, $disallowed, $censor);
    }
}

if (!function_exists('str_randomChar')) {
    function str_randomChar($string = '')
    {
        return Str::randomChar($string);
    }
}

if (!function_exists('str_randomSubstring')) {
    function str_randomSubstring($string = '', $length = 0)
    {
        return Str::randomSubstring($string, $length);
    }
}

if (!function_exists('str_camelToSnake')) {
    function str_camelToSnake($string)
    {
        return Str::camelToSnake($string);
    }
}

if (!function_exists('str_snakeToCamel')) {
    function str_snakeToCamel($string)
    {
        return Str::snakeToCamel($string);
    }
}

if (!function_exists('srt_ruToEn')) {
    function str_ruToEn($string)
    {
        return Str::ruToEn($string);
    }
}

if (!function_exists('str_to1337')) {
    function str_to1337($string)
    {
        return Str::to1337($string);
    }
}

if (!function_exists('error')) {
    /**
     * @param $code
     * @param array $params
     */
    function error($code, array $params = [])
    {
        http_response_code(404);
        exit(render('errors/' . $code, $params));
    }
}

if (!function_exists('csrf_token')) {
    function csrf_token()
    {
        return session()->get('_token');
    }
}
