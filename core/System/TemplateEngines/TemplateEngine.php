<?php

namespace Core\System\TemplateEngines;

use Core\Justify;

/**
 * Class TemplateEngine
 *
 * @since 2.3.0
 * @package Justify\System\TemplateEngines
 */
abstract class TemplateEngine implements TemplateEngineInterface
{
	protected $config;
	protected $activeTemplateEngine;

	public function __construct()
	{
		$this->activeTemplateEngine = Justify::$settings['template_engine'];
		$this->config = Justify::$settings['template_engines'][$this->activeTemplateEngine];
	}

	protected function getViewsPath(): string
	{
		return BASE_DIR . '/views/';
	}

	protected function getExtension(): string
	{
		return '.' . $this->config['file_extension'];
	}

	protected function createViewPath(string $view): string
	{
		return $this->getViewsPath() . $view . $this->getExtension();
	}
}
