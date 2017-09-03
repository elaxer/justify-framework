<?php
function is_ip($ip)
{
	if (filter_var($ip, FILTER_VALIDATE_IP))
   		return true;

	return false;
}

function is_ipv4($ip)
{
	if (filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4))
   		return true;

	return false;
}

function is_ipv6($ip)
{
	if (filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV6))
   		return true;

	return false;
}

function is_date($date /*DD-MM-YYYY*/)
{
	$result = explode('-', $date);
		if (checkdate($result[1], $result[0], $result[2]))
			return true;

		return false;
}

function is_email($email)
{
	if (filter_var($email, FILTER_VALIDATE_EMAIL))
    	return true;

	return false;
}

function is_url($url)
{
	if (filter_var($url, FILTER_VALIDATE_URL))
		return true;

	return false;
}
