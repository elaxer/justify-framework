<?php

/**
 * Function returns generated password
 *
 * @deprecated use Justify\Components\Password::generate()
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

    if (! $charsOfFuturePassword) {
        return '';
    }

    $password = '';
    $lenOfChars = mb_strlen($charsOfFuturePassword);

    for ($i = 0; $i < $length; $i++) {
        $password .= $charsOfFuturePassword[mt_rand(0, $lenOfChars - 1)];
    }

    return $password;
}
