<?php

namespace Core\Components\TemplateEngines;

/**
 * Interface TemplateEngineInterface
 *
 * @since 2.3.0
 * @package Justify\System\TemplateEngines
 */
interface TemplateEngineInterface
{
    /**
     * Renders view
     *
     * @param string $view view file
     * @param array $params reducible params for view
     * @return string rendered view
     */
	public function render($view, array $params = []);
}
