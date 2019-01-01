<?php

namespace Core\Components\TemplateEngines;

/**
 * Class TemplateEngineFactory
 *
 * @since 2.3.0
 * @package Justify\System\TemplateEngines
 */
class TemplateEngineFactory
{
    const NAMESPACE = '\\Core\\Components\\TemplateEngines\\';

	public static function create(string $templateEngineName, array $params = []): object
	{
		$className = self::NAMESPACE . $templateEngineName;
		
		return new $className(...$params);
	}
}
