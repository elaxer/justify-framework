<?php

namespace Core\Components\Mvc;

use Core\Justify;
use Core\Components\TemplateEngines\TemplateEngineDecorator;
use Core\Components\TemplateEngines\TemplateEngineFactory;
use DebugBar\StandardDebugBar;

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

        $debugBar = new StandardDebugBar();
        $debugBarRenderer = $debugBar->getJavascriptRenderer();

        $templateEngineDecorator = new TemplateEngineDecorator($templateEngine, $debugBarRenderer);

		return $templateEngineDecorator->render($view, $params);
	}

	//todo do not forget about this
	public static function renderWidget($widget, array $params = [])
    {
        $widgetsPath = BASE_DIR . '/core/Widgets/templates';

        ob_start();
        extract($params);

        require_once "$widgetsPath/$widget.php";

        $content = ob_get_contents();

        ob_end_clean();

        return $content;
    }

	private static function getTemplateEngine()
	{
		$templateEngine = Justify::$settings['template_engines']['engine'];

		return TemplateEngineFactory::create($templateEngine);
	}
}
