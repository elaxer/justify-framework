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

    /**
     * @param string $templateEngineName
     * @param array $params
     * @return TemplateEngine
     */
	public static function create($templateEngineName, array $params = [])
	{
		$className = self::NAMESPACE . ucfirst($templateEngineName);
		
		return new $className(...$params);
	}
}
