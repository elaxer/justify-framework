<?php

if (!function_exists('render')) {
	function render(string $view, array $params = []): string
	{
		return \Core\System\View::render($view, $params);
	}
}
