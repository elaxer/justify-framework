<?php

namespace Justify\System\TemplateEngines;

/**
 * Class Twig
 *
 * @since 2.3.0
 * @package Justify\System\TemplateEngines
 */
class Twig extends TemplateEngine implements TemplateEngineInterface
{
	private $twig;

	public function __construct()
	{
		parent::__construct();

		$config = $this->config['config'];

		$loader = new \Twig_Loader_Filesystem(BASE_DIR . '/views/');
		$this->twig = new \Twig_Environment($loader, $config);
	}

	public function render(string $view, array $params = []): string
	{
		$view = $this->createViewPath($view);

		$template = $this->twig->load($view);

		return $template->render($params);
	}

	protected function createViewPath(string $view): string
	{
		return $view . $this->getExtension();
	}
}
