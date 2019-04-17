<?php

namespace Core\Components;

/**
 * Class Password
 *
 * Class for working with passwords
 *
 * @since 2.2.0
 * @package Justify\Components
 */
class Password
{
    const LOWER_CASE = 'qwertyuiopasdfghjklzxcvbnm';
    const UPPER_CASE = 'QWERTYUIOPASDFGHJKLZXCVBNM';
    const DIGITS = '0123456789';
    const SPECIAL_CHARS = '!@#$%^&*()_+-=`~/*\\"[]{}?\'';

    /**
     * Returns hashed password
     *
     * @param string $password
     * @return bool|string
     */
    public static function getHash($password)
    {
        return password_hash($password, PASSWORD_DEFAULT);
    }

    /**
     * Verifies password
     *
     * @param string $password
     * @param string $hash
     * @return bool
     */
    public static function verify($password, $hash)
    {
        return password_verify($password, $hash);
    }

    /**
     * Returns information about hash
     *
     * @param string $hash
     * @return array
     */
    public static function getInfo($hash)
    {
        return password_get_info($hash);
    }

    /**
     * Function returns generated password
     *
     * @param integer $length length of password
     * @param array $rules chars of future password
     * @return string
     */
    public static function generate($length, array $rules = [
        'lowerCase' => true,
        'upperCase' => true,
        'digits' => true,
        'specialChars' => false
    ])
    {
        $chars = [
            'lowerCase' => self::LOWER_CASE,
            'upperCase' => self::UPPER_CASE,
            'digits' => self::DIGITS,
            'specialChars' => self::SPECIAL_CHARS
        ];

        $charsOfFuturePassword = '';

        foreach ($rules as $rule => $value) {
            if (isset($chars[$rule]) && $value) {
                $charsOfFuturePassword .= $chars[$rule];
            }
        }

        if (!$charsOfFuturePassword) {
            return '';
        }

        $password = '';
        $lenOfChars = mb_strlen($charsOfFuturePassword);

        for ($i = 0; $i < $length; $i++) {
            $password .= $charsOfFuturePassword[mt_rand(0, $lenOfChars - 1)];
        }

        return $password;
    }
}
