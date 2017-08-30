<?php
function is_ip($ip)
{
	if (filter_var($ip, FILTER_VALIDATE_IP))
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
