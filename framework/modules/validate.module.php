<?php
/**
 * Function checks IP-address for validity
 *
 * @param string $ip IP-address
 * @return bool
 */
function isIp($ip)
{
	if (filter_var($ip, FILTER_VALIDATE_IP))
   		return true;

	return false;
}

/**
 * Function checks IP-address version 4 for validity
 *
 * @param string $ip IP-address
 * @return bool
 */
function isIpv4($ip)
{
	if (filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4))
   		return true;

	return false;
}

/**
 * Function checks IP-address version 6 for validity
 *
 * @param string $ip IP-address
 * @return bool
 */
function isIpv6($ip)
{
	if (filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV6))
   		return true;

	return false;
}


/**
 * Function checks date for validity
 *
 * Please, use date format DD-MM-YYYY
 *
 * @param string $date date
 * @return bool
 */
function isDate($date)
{
	$result = explode('-', $date);
		if (checkdate($result[1], $result[0], $result[2]))
			return true;

		return false;
}

/**
 * Function checks E-mail for validity
 *
 * @param string $email E-mail
 * @return bool
 */
function isEmail($email)
{
	if (filter_var($email, FILTER_VALIDATE_EMAIL))
    	return true;

	return false;
}

/**
 * Function checks URL for validity
 *
 * @param string $url URL
 * @return bool
 */
function isUrl($url)
{
	if (filter_var($url, FILTER_VALIDATE_URL))
		return true;

	return false;
}
