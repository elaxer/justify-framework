<?php

/**
 * Function returns generated password
 *
 * @param integer $length length of password
 * @param bool $specialChars includes special symbols or not
 * @param bool $littleLetters includes little chars or not
 * @param bool $bigLetters includes big chars or not
 * @param bool $numbers includes numbers or not
 * @return string|bool
 */
function generatePassword(
    $length,
    $specialChars = false,
    $littleLetters = true,
    $bigLetters = true,
    $numbers = true
) {
    $chars = [
        'littleLetters' => 'qwertyuiopasdfghjklzxcvbnm',
        'bigLetters' => 'QWERTYUIOPASDFGHJKLZXCVBNM',
        'numbers' => '1234567890',
        'specialChars' => "!@#$%^&*()_+-=`~/*\\\"[]{}?'"
    ];
    $charsOfFuturePassword = '';

    if ($littleLetters) {
        $charsOfFuturePassword .= $chars['littleLetters'];
    }

    if ($bigLetters) {
        $charsOfFuturePassword .= $chars['bigLetters'];
    }

    if ($numbers) {
        $charsOfFuturePassword .= $chars['numbers'];
    }

    if ($specialChars) {
        $charsOfFuturePassword .= $chars['specialChars'];
    }

    if (! $charsOfFuturePassword) {
        return false;
    }

    $password = '';
    $lenOfChars = mb_strlen($charsOfFuturePassword);

    for ($i = 0; $i < $length; $i++) {
        $password .= $charsOfFuturePassword[mt_rand(0, $lenOfChars - 1)];
    }

    return $password;
}
