<?php

function dump($variable, $exit = false, $text = false) {
	echo '<pre>';
	var_dump($variable);
	echo '</pre>';

	if ($exit) {
		die($text);
	}
}
