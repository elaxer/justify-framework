<?php

namespace Justify\System\TemplateEngines;

/**
 * Class TemplateEngineFactory
 *
 * @since 2.3.0
 * @package Justify\System\TemplateEngines
 */
class TemplateEngineFactory
{
	public static function create(string $templateEngineName): object
	{
		$className = '\Justify\System\TemplateEngines\\' . $templateEngineName;
		
		return new $className;
	}
}
