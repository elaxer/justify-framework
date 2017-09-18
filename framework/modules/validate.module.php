<?php
/**
 * Functions for validate types of variables
 * @return bool
 */

function isIp($ip)
{
	if (filter_var($ip, FILTER_VALIDATE_IP))
   		return true;

	return false;
}

function isIpv4($ip)
{
	if (filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4))
   		return true;

	return false;
}

function isIpv6($ip)
{
	if (filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV6))
   		return true;

	return false;
}

/**
 * Use date format DD-MM-YYYY
 */
function isDate($date)
{
	$result = explode('-', $date);
		if (checkdate($result[1], $result[0], $result[2]))
			return true;

		return false;
}

function isEmail($email)
{
	if (filter_var($email, FILTER_VALIDATE_EMAIL))
    	return true;

	return false;
}

function isUrl($url)
{
	if (filter_var($url, FILTER_VALIDATE_URL))
		return true;

	return false;
}
