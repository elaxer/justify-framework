<?php

namespace Core\Components\TemplateEngines;

use DebugBar\JavascriptRenderer;

class TemplateEngineDecorator implements TemplateEngineInterface
{
    private $templateEngine;
    private $debugBar;

    public function __construct(TemplateEngine $templateEngine, JavascriptRenderer $debugBar)
    {
        $this->templateEngine = $templateEngine;
        $this->debugBar = $debugBar;
    }
    public function render(string $view, array $params = []): string
    {
        return $this->debugBar->renderHead() .
            $this->templateEngine->render($view, $params) .
            $this->debugBar->render();
    }
}
