<?php

namespace Core\Components;

/**
 * Class Str
 *
 * Class for working with strings
 *
 * @since 2.2.0
 * @package Justify\Components
 */
class Str
{
    /**
     * Returns random string
     *
     * @since 2.2.0
     * @param int $length - password length
     * @param string $chars - chars of future string
     * @return string
     */
    public static function random(
        $length = 16,
        $chars = 'qwertyuiopasdfghjklzxcvbnmQWERTYUIOPASDFGHJKLZXCVBNM1234567890'
    )
    {
        $string = '';
        $lenOfChars = mb_strlen($chars);

        for ($i = 0; $i < $length; $i++) {
            $string .= $chars[mt_rand(0, $lenOfChars - 1)];
        }

        return $string;
    }

    /**
     * Returns shorted text.
     *
     * Returns shorted text if length of text bigger than limit with postfix
     *
     * @since 2.2.0
     * @param string $text
     * @param integer $limit
     * @param string $postfix
     * @return string
     */
    public static function shorten($text, $limit, $postfix = '...')
    {
        if (mb_strlen($text) > $limit) {
            return mb_substr($text, 0, $limit) . $postfix;
        }

        return $text;
    }

    /**
     * Censors words from disallowed words
     *
     * @since 2.2.0
     * @param string $string
     * @param array $disallowed
     * @param string $censor
     * @return null|string|string[]
     */
    public static function wordCensor($string, array $disallowed, $censor = '')
    {
        $string = trim($string);
        $disallowed = array_map(function ($pattern) {
            return '~' . $pattern . '~iu';
        }, $disallowed);

        if (!$censor) {
            return preg_replace_callback($disallowed, function ($m) {
                return str_repeat('*', mb_strlen($m[0]));
            }, $string);
        }

        return preg_replace($disallowed, $censor, $string);
    }

    /**
     * Returns random char from string
     *
     * @since 2.2.0
     * @param string $string
     * @return string
     */
    public static function randomChar($string = '')
    {
        if ($string == '') {
            $string = 'qwertyuiopasdfghjklzxcvbnmQWERTYUIOPASDFGHJKLZXCVBNM1234567890';
        }

        return $string[mt_rand(0, mb_strlen($string) - 1)];
    }

    /**
     * Returns random substring from string
     *
     * @since 2.2.0
     * @param string $string
     * @param integer $length length of substring
     * @return string
     */
    public static function randomSubstring($string = '', $length = 0)
    {
        if ($string == '') {
            $string = 'qwertyuiopasdfghjklzxcvbnmQWERTYUIOPASDFGHJKLZXCVBNM1234567890';
        }

        $shuffledString = str_shuffle($string);

        return mb_substr($shuffledString, 0, $length);
    }

    /**
     * Removes multiplies from string
     *
     * @since 2.2.0
     * @param string $string
     * @return null|string|string[]
     */
    public static function removeMultiplies($string)
    {
        $pattern = '~(.*?)(\1+)~iu';

        return preg_replace($pattern, '$1', $string);
    }

    /**
     * Converts camelCase to snake_case
     *
     * @since 2.0.0
     * @param string $string converts string
     * @return string
     */
    public static function camelToSnake($string)
    {
        $pattern = '/[A-Z][A-Z0-9]*(?=$|[A-Z][a-z0-9])|[A-Za-z][a-z0-9]+/';
        preg_match_all($pattern, $string, $matches);

        $matches[0] = array_map(function ($m) {
            return strtolower($m);
        }, $matches[0]);

        return implode('_', $matches[0]);
    }

    /**
     * Converts snake_case to camelCase
     *
     * @since 2.0.0
     * @param string $string converts string
     * @param bool $studly if studly true then snake case will be converted to StudlyCamelCase
     * @return string
     */
    public static function snakeToCamel($string, $studly = false)
    {
        $segments = explode('_', $string);

        if ($studly) {
            $segments = array_map(function ($segment) {
                return ucfirst($segment);
            }, $segments);

            return implode('', $segments);
        }

        $firstSegment = array_shift($segments);
        $segments = array_map(function ($segment) {
            return ucfirst($segment);
        }, $segments);

        array_unshift($segments, $firstSegment);

        return implode('', $segments);
    }

    /**
     * Method return translated russian string to english string
     *
     * @param string $string string to translate
     * @return string
     */
    public static function ruToEn($string)
    {
        $converter = [
            'а' => 'a', 'б' => 'b', 'в' => 'v',
            'г' => 'g', 'д' => 'd', 'е' => 'e',
            'ё' => 'e', 'ж' => 'zh', 'з' => 'z',
            'и' => 'i', 'й' => 'y', 'к' => 'k',
            'л' => 'l', 'м' => 'm', 'н' => 'n',
            'о' => 'o', 'п' => 'p', 'р' => 'r',
            'с' => 's', 'т' => 't', 'у' => 'u',
            'ф' => 'f', 'х' => 'h', 'ц' => 'c',
            'ч' => 'ch', 'ш' => 'sh', 'щ' => 'sch',
            'ь' => '\'', 'ы' => 'y', 'ъ' => '\'',
            'э' => 'e', 'ю' => 'yu', 'я' => 'ya',

            'А' => 'A', 'Б' => 'B', 'В' => 'V',
            'Г' => 'G', 'Д' => 'D', 'Е' => 'E',
            'Ё' => 'E', 'Ж' => 'Zh', 'З' => 'Z',
            'И' => 'I', 'Й' => 'Y', 'К' => 'K',
            'Л' => 'L', 'М' => 'M', 'Н' => 'N',
            'О' => 'O', 'П' => 'P', 'Р' => 'R',
            'С' => 'S', 'Т' => 'T', 'У' => 'U',
            'Ф' => 'F', 'Х' => 'H', 'Ц' => 'C',
            'Ч' => 'Ch', 'Ш' => 'Sh', 'Щ' => 'Sch',
            'Ь' => '\'', 'Ы' => 'Y', 'Ъ' => '\'',
            'Э' => 'E', 'Ю' => 'Yu', 'Я' => 'Ya',
        ];

        return strtr($string, $converter);
    }

    /**
     * Method return translated russian string to leet(1337) language
     *
     * @param string $string string to translate to leet language
     * @return string
     */
    public static function to1337($string)
    {
        $string = mb_strtoupper($string);

        $converter = [
            'А' => '4', 'Б' => '6', 'В' => '8',
            'Г' => 'r', 'Д' => '|)', 'Е' => '3',
            'Ё' => 'Ё', 'Ж' => '}|{', 'З' => '3',
            'И' => 'u', 'Й' => 'u*', 'К' => '|&lt;',
            'Л' => '/I', 'М' => '|\/|', 'Н' => '|-|',
            'О' => '0', 'П' => 'n', 'Р' => '|&gt;',
            'С' => 'c', 'Т' => '7', 'У' => '`/',
            'Ф' => 'qp', 'Х' => 'X', 'Ц' => 'L|',
            'Ч' => '\'-|', 'Ш' => 'W', 'Щ' => 'W,',
            'Ь' => 'b', 'Ы' => 'bl', 'Ъ' => '`b',
            'Э' => '-)', 'Ю' => '|-0', 'Я' => '9|',
        ];

        return strtr($string, $converter);
    }
}
