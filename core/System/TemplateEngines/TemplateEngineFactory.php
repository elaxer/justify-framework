<?php

namespace Core\System\TemplateEngines;

use Core\FactoryInterface;

/**
 * Class TemplateEngineFactory
 *
 * @since 2.3.0
 * @package Justify\System\TemplateEngines
 */
class TemplateEngineFactory implements FactoryInterface
{
	public static function create(string $templateEngineName, array $params = []): object
	{
		$className = '\Core\System\TemplateEngines\\' . $templateEngineName;
		
		return new $className(...$params);
	}
}
