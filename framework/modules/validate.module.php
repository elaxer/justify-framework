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

function form_validate(array $segments)
{
	$errors = array();
	foreach ($segments as $var => $parametrs) {

		if (isset($parametrs['filter_tags']) && $parametrs['filter_tags'] === true) {
			$var = htmlspecialchars($var);
		}

		if (isset($parametrs['delete_tags']) && $parametrs['delete_tags'] === true) {
			$var = strip_tags($var);
		}

		if (isset($parametrs['ltrim']) && $parametrs['ltrim'] === true) {
			$var = ltrim($var);
		}

		if (isset($parametrs['rtrim']) && $parametrs['rtrim'] === true) {
			$var = rtrim($var);
		}

		if (isset($parametrs['trim']) && $parametrs['trim'] === true) {
			$var = trim($var);
		}

		if (isset($parametrs['required']) && $parametrs['required'] === true && !$var) {
			$errors[] = 'Поле должно быть заполнено!';
		}

		if (isset($parametrs['minlen']) && mb_strlen($var) < $parametrs['minlen']) {
			$errors[] = 'Строка должна быть не меньше ' . $parametrs['minlen'] . ' симв. !';
		}

		if (isset($parametrs['maxlen']) && mb_strlen($var) > $parametrs['maxlen']) {
			$errors[] = 'Строка должна быть не больше ' . $parametrs['maxlen'] . ' симв. !';
		}


		if (isset($parametrs['type']) && $parametrs['type'] == 'email' && !is_email($var)) {
			$errors[] = 'Неверный email!';
		}

		if (isset($parametrs['type']) && $parametrs['type'] == 'date' && !is_date($var)) {
			$errors[] = 'Неверная дата!';
		}

		if (isset($parametrs['equals_to']) && $var != $parametrs['equals_to']) {
			$errors[] = 'Строки не совпадают!';
		}

		if (isset($parametrs['forbidden_symbols'])) {
			for ($i = 0; $i < mb_strlen($parametrs['forbidden_symbols']); $i++) {
				if (strpos($var, $parametrs['forbidden_symbols'][$i])) {
					$errors[] = 'Нельзя использовать символы: ' . $parametrs['forbidden_symbols'];
					break;
				}
			}
		}

		if (isset($parametrs['required_symbols'])) {
			for ($i = 0; $i < mb_strlen($parametrs['required_symbols']); $i++) {
				if (strpos($var, $parametrs['required_symbols'][$i]) === false) {
					$errors[] = 'Должны быть использованы символы: ' . $parametrs['required_symbols'];
					break;
				}
			}
		}

	}
	if (empty($errors)) {
		return true;
	}
	return $errors;
}
