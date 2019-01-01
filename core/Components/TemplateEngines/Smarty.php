<?php

namespace Core\Components\TemplateEngines;

/**
 * Class Smarty
 *
 * @since 2.3.0
 * @package Justify\System\TemplateEngines
 */
class Smarty extends TemplateEngine
{
    private $smarty;

    public function __construct()
    {
        parent::__construct();

        $this->smarty = new \Smarty();
        $config = $this->config['config'];

        $this->smarty->template_dir = $this->getViewsPath();

        foreach ($config as $key => $value) {
            $this->smarty->$key = $value;
        }
    }

    public function render(string $view, array $params = []): string
    {
        $view = $this->createViewPath($view);

        foreach ($params as $key => $value) {
            $this->smarty->assign($key, $value);
        }

        $this->smarty->display($view);

        return '';
    }

    protected function createViewPath(string $view): string
    {
        return $view . $this->getExtension();
    }
}
