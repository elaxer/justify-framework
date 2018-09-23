<?php

/* index.twig */
class __TwigTemplate_50c76985997d44258b1038e01de8c35eaf51559f3771325e46e596451d19ad8d extends Twig_Template
{
    private $source;

    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!DOCTYPE html>
<html>
<head>
    <meta charset=\"UTF-8\">
    <title><?= \$this->title ?></title>
</head>
<body>

    <div class=\"wrapper\">
        <div class=\"content\">
            <div class=\"navbar navbar-inverse\">
                <div class=\"container\">
                    <div class=\"navbar-header\">
                        <a href=\"<?= Justify::\$home ?>\" class=\"navbar-brand\">Justify</a>
                    </div>
                </div>
            </div>

            <div class=\"container\">
                <?= Session::render() ?>
                <div class=\"container\">
                    <div class=\"starter-template\">
                        <h1><?= Lang::get('index.welcome') ?>!</h1>
                        <p class=\"lead\">
                            <?= Lang::get('index.successful') ?>
                            <?= Html::encode(\$frameworkName) ?>
                            <?= Html::encode(\$frameworkVersion) ?>!
                        </p>
                    </div>
            <div class=\"row\">
                <div class=\"col-md-4\">
                    <h2><?= Lang::get('index.example') ?></h2>
                    <p>
                        <?= Lang::get('index.lorem') ?>
                    </p>
                </div>
                <div class=\"col-md-4\">
                    <h2>";
        // line 38
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["Lang"] ?? null), "get", array(0 => "index.about"), "method"), "html", null, true);
        echo "</h2>
                    <p>
                        <?= Lang::get('index.lorem') ?>
                    </p>
                </div>
                <div class=\"col-md-4\">
                    <h2><?= Lang::get('index.contacts') ?></h2>
                    <p>
                        <?= Lang::get('index.lorem') ?>
                    </p>
                </div>
            </div>
        </div>
                </div>

            </div>

            <footer>
                <hr>
                <div class=\"container\">
                    <p>&copy; Justify Framework <?= date('Y') ?></p>
                </div>
            </footer>

        </div>
</body>
</html>";
    }

    public function getTemplateName()
    {
        return "index.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  62 => 38,  23 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("<!DOCTYPE html>
<html>
<head>
    <meta charset=\"UTF-8\">
    <title><?= \$this->title ?></title>
</head>
<body>

    <div class=\"wrapper\">
        <div class=\"content\">
            <div class=\"navbar navbar-inverse\">
                <div class=\"container\">
                    <div class=\"navbar-header\">
                        <a href=\"<?= Justify::\$home ?>\" class=\"navbar-brand\">Justify</a>
                    </div>
                </div>
            </div>

            <div class=\"container\">
                <?= Session::render() ?>
                <div class=\"container\">
                    <div class=\"starter-template\">
                        <h1><?= Lang::get('index.welcome') ?>!</h1>
                        <p class=\"lead\">
                            <?= Lang::get('index.successful') ?>
                            <?= Html::encode(\$frameworkName) ?>
                            <?= Html::encode(\$frameworkVersion) ?>!
                        </p>
                    </div>
            <div class=\"row\">
                <div class=\"col-md-4\">
                    <h2><?= Lang::get('index.example') ?></h2>
                    <p>
                        <?= Lang::get('index.lorem') ?>
                    </p>
                </div>
                <div class=\"col-md-4\">
                    <h2>{{ Lang.get('index.about') }}</h2>
                    <p>
                        <?= Lang::get('index.lorem') ?>
                    </p>
                </div>
                <div class=\"col-md-4\">
                    <h2><?= Lang::get('index.contacts') ?></h2>
                    <p>
                        <?= Lang::get('index.lorem') ?>
                    </p>
                </div>
            </div>
        </div>
                </div>

            </div>

            <footer>
                <hr>
                <div class=\"container\">
                    <p>&copy; Justify Framework <?= date('Y') ?></p>
                </div>
            </footer>

        </div>
</body>
</html>", "index.twig", "/var/www/justifyframe.com/views/index.twig");
    }
}
