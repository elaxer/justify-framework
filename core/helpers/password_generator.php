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
    return \Core\Components\Password::generate($length, $rules);
}
