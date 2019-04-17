<?php

namespace Core\Components\TemplateEngines;

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
		$this->activeTemplateEngine = config('template_engines')['engine'];
		$this->config = config('template_engines')[$this->activeTemplateEngine];
	}

	protected function getViewsPath()
	{
		return BASE_DIR . '/views/';
	}

	protected function getExtension()
	{
		return '.' . $this->config['file_extension'];
	}

	protected function createViewPath($view)
	{
		return $this->getViewsPath() . $view . $this->getExtension();
	}
}
