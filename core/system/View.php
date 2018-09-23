<?php

namespace Core\System;

use Core\System\TemplateEngines\TemplateEngineFactory;
use Core\Justify;

/**
 * Class View
 *
 * @since 2.3.0
 * @package Justify\System
 */
class View
{
	public static function render(string $view, array $params = []): string
	{
		$templateEngine = self::getTemplateEngine();

		return $templateEngine->render($view, $params);
	}

	private static function getTemplateEngine(): object
	{
		$templateEngine = Justify::$settings['template_engine'];

		return TemplateEngineFactory::create($templateEngine);
	}
}
