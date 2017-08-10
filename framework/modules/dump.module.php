<?php

function dump($variable, $exit = false) {
	echo '<pre>';
	print_r($variable);
	echo '</pre>';

	if ($exit) {
		exit;
	}
}
