<?php

if (!function_exists('render')) {
	function render(string $view, array $params = []): string
	{
		return \Justify\System\View::render($view, $params);
	}
}
