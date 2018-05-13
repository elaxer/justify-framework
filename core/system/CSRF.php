<?php

namespace Justify\System;

use Justify\Exceptions\CSRFProtectionException;

/**
 * Class CSRF
 *
 * Class for protect your forms from CSRF attacks
 *
 * @since 2.2.0
 * @package Justify\System
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
        $session = new Session();

        $session->set('_token', self::$token);
    }

    /**
     * Checks hashes equals
     *
     * Checks post hash and session hash for equals
     *
     * @param Session $session
     * @param Request $request
     * @throws CSRFProtectionException
     */
    public static function checkHashesEquals(Session $session, Request $request)
    {
        if (!$request->post('_token', false)
            || !$session->has('_token')
            || !hash_equals($session->get('_token'), $request->post('_token'))
        ) {
            throw new CSRFProtectionException('Sent data without CSRF field or CSRF attack attemp');
        }
    }
}
