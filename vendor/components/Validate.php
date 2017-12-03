<?php

namespace Justify\Components;

class Validate
{
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
