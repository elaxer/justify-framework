<?php

namespace Justify\Components;

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
    /**
     * Returns hashed password
     *
     * @param string $password
     * @return bool|string
     */
    public static function getHash(string $password)
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
    public static function verify(string $password, string $hash): bool
    {
        return password_verify($password, $hash);
    }

    /**
     * Returns information about hash
     *
     * @param string $hash
     * @return array
     */
    public static function getInfo(string $hash): array
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
    public static function generate(int $length, array $rules = [
        'littleLetters' => true,
        'bigLetters' => true,
        'numbers' => true,
        'specialChars' => false
    ]): string
    {
        $chars = [
            'littleLetters' => 'qwertyuiopasdfghjklzxcvbnm',
            'bigLetters' => 'QWERTYUIOPASDFGHJKLZXCVBNM',
            'numbers' => '1234567890',
            'specialChars' => "!@#$%^&*()_+-=`~/*\\\"[]{}?'"
        ];
        $charsOfFuturePassword = '';

        if (isset($rules['littleLetters']) && $rules['littleLetters']) {
            $charsOfFuturePassword .= $chars['littleLetters'];
        }

        if (isset($rules['bigLetters']) && $rules['bigLetters']) {
            $charsOfFuturePassword .= $chars['bigLetters'];
        }

        if (isset($rules['numbers']) && $rules['numbers']) {
            $charsOfFuturePassword .= $chars['numbers'];
        }

        if (isset($rules['specialChars']) && $rules['specialChars']) {
            $charsOfFuturePassword .= $chars['specialChars'];
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
