<?php

namespace Core\Components\Http;

use Core\Exceptions\CSRFProtectionException;

/**
 * Class CSRF
 *
 * Class for protect your forms from CSRF attacks
 *
 * @since 2.2.0
 * @package Core\System
 */
class CSRF
{
    /**
     * Generated CSRF token
     *
     * @var string
     */
    public static $token;

    /**
     * Generates CSRF token
     *
     * @return string
     */
    public static function generateToken()
    {
        return bin2hex(openssl_random_pseudo_bytes(32));
    }

    /**
     * Sets in session generated CSRF token
     */
    public static function setSession()
    {
        session()->set('_token', self::$token);
    }

    /**
     * Checks hashes equals
     *
     * Checks post hash and session hash for equals
     *
     * @throws CSRFProtectionException
     */
    public static function checkHashesEquals()
    {
        $hasRequestToken = request()->request->get('_token');
        $hasSessionToken = session()->has('_token');
        $tokensIsMatches = hash_equals(session()->get('_token'), request()->request->get('_token'));

        if (!$hasRequestToken || !$hasSessionToken || !$tokensIsMatches) {
            throw new CSRFProtectionException('Sent data without CSRF field or CSRF attack attempt');
        }
    }
}
