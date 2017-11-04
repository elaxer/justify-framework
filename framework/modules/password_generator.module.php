<?php

namespace justify\modules;

/**
 * Function returns generated password
 *
 * @param integer $length length of password
 * @param bool $specialSymbols includes special symbols or not
 * @param bool $littleChars includes little chars or not
 * @param bool $bigChars includes big chars or not
 * @param bool $numbers includes numbers or not
 * @return string|bool
 */
function passwordGenerate($length, $specialSymbols = false, $littleChars = true, $bigChars = true, $numbers = true)
{
    $chars = "";
    if ($littleChars) {
        $chars .= "qwertyuiopasdfghjklzxcvbnm";
    }

    if ($bigChars) {
        $chars .= "QWERTYUIOPASDFGHJKLZXCVBNM";
    }

    if ($numbers) {
        $chars .= "1234567890";
    }

    if ($specialSymbols) {
        $chars .= "!@#$%^&*()_+-=`~/*\\\"[]{}?'";
    }

    if (!$chars || $length < 3) {
        return false;
    }

    $password = "";
    $lenOfChars = mb_strlen($chars);
    for ($i = 0; $i < $length; $i++) {
        $password .= $chars[mt_rand(0, $lenOfChars - 1)];
    }

    unset($chars);
    return $password;
}
