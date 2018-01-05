<?php

namespace Justify\Components;

/**
 * Class Validate
 *
 * Class for validation variables
 *
 * @package Justify\Components
 */
class Validate
{
    /**
     * Array of errors
     *
     * @since 2.0
     * @var array
     */
    public static $errors;

    /**
     * Available types of variables
     *
     * @since 2.0
     * @var array
     */
    public static $availableTypes = [
        'number', 'url', 'ip', 'ipv4',
        'ipv6', 'email', 'text'
    ];

    /**
     * Validate variables
     *
     * @example
     * $var = 'test!';
     * $var2 = '127.0.0.1';
     * $data = [
     *       $var => [
     *           'required' => true, 'type' => 'email',
     *           'min' => 3, 'max' => 20, 'wrong' => '!#%',
     *           'require' => '@?*', 'label' => 'Var'
     *       ],
     *     $var2 => [
     *         'required' => true, 'type' => 'ipv6',
     *         'require' => ':0', 'wrong' => '.?',
     *         'label' => 'IPv6'
     *     ]
     * ];
     * if (! Validate::validate($data))
     *     Dump::dd(Validate::$errors);
     *
     * @since 2.0
     * @param array $params
     * @return bool
     */
    public static function validate($params)
    {
        foreach ($params as $param => $settings) {
            foreach ($settings as $property => $value) {
                if (isset($settings['label'])) {
                    $label = $settings['label'];
                } else {
                    $label = $param;
                }

                if ($property == 'required' && $value && ! $param) {
                    self::$errors[$param][] = "$label is required";
                }
                if ($property == 'max' && (mb_strlen($param) > $value)) {
                    self::$errors[$param][] = "$label must be less than $value symbols";
                }
                if ($property == 'min' && (mb_strlen($param) < $value)) {
                    self::$errors[$param][] = "$label must be more than $value symbols";
                }
                if ($property == 'wrong' && strpbrk($param, $value) !== false) {
                    self::$errors[$param][] = "$label can't have \"$value\" symbols";
                }
                if ($property == 'require' && strpbrk($param, $value) === false) {
                    self::$errors[$param][] = "$label must have \"$value\" symbols";
                }
                if ($property == 'type' && in_array($value, self::$availableTypes)) {
                    if ($value == 'number' && ! is_numeric($param)) {
                        self::$errors[$param][] = "$label must be a number";
                    }
                    if ($value == 'url' && ! self::isUrl($param)) {
                        self::$errors[$param][] = "$label must be a URL";
                    }
                    if ($value == 'ip' && ! self::isIp($param)) {
                        self::$errors[$param][] = "$label must be a IP";
                    }
                    if ($value == 'ipv4' && ! self::isIpv4($param)) {
                        self::$errors[$param][] = "$label must be a IPv4";
                    }
                    if ($value == 'ipv6' && ! self::isIpv6($param)) {
                        self::$errors[$param][] = "$label must be a IPv6";
                    }
                    if ($value == 'email' && ! self::isEmail($param)) {
                        self::$errors[$param][] = "$label must be a E-mail";
                    }
                    if ($value == 'text' && ! is_string($param)) {
                        self::$errors[$param][] = "$label must be a text";
                    }
                }
            }
        }
        
        return empty(self::$errors);
    }

    /**
     * Method checks IP-address for validity
     *
     * @param string $ip IP-address
     * @return bool
     */
    public static function isIp($ip)
    {
        return filter_var($ip, FILTER_VALIDATE_IP) ? true : false;
    }

    /**
     * Method checks IP-address version 4 for validity
     *
     * @param string $ip IP-address
     * @return bool
     */
    public static function isIpv4($ip)
    {
        return filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4) ? true : false;
    }

    /**
     * Method checks IP-address version 6 for validity
     *
     * @param string $ip IP-address
     * @return bool
     */
    public static function isIpv6($ip)
    {
        return filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV6) ? true : false;
    }

    /**
     * Method checks E-mail for validity
     *
     * @param string $email E-mail
     * @return bool
     */
    public static function isEmail($email)
    {
        return filter_var($email, FILTER_VALIDATE_EMAIL) ? true : false;
    }

    /**
     * Method checks URL for validity
     *
     * @param string $url URL
     * @return bool
     */
    public static function isUrl($url)
    {
        return filter_var($url, FILTER_VALIDATE_URL) ? true : false;
    }
}
