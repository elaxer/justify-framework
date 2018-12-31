<?php

namespace Core\System\TemplateEngines;

/**
 * Interface TemplateEngineInterface
 *
 * @since 2.3.0
 * @package Justify\System\TemplateEngines
 */
interface TemplateEngineInterface
{
	public function render(string $view, array $params = []): string;
}
