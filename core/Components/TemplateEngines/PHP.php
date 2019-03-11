<?php

namespace Core\Components\TemplateEngines;

/**
 * Class PHP
 *
 * @since 2.3.0
 * @package Justify\System\TemplateEngines
 */
class PHP extends TemplateEngine
{
	public function render($view, array $params = [])
	{
		extract($params);

		$viewPath = $this->createViewPath($view);

		ob_start();

		require_once $viewPath;

		$template = ob_get_clean();

		return $template;
	}
}
