<?php
$start = microtime(true);

require_once BASE_DIR . '/framework/justify/BaseJustify.php';

class Justify extends BaseJustify
{
}

Justify::defineConstants();
Justify::loadModules();

spl_autoload_register(['Justify', 'autoload']);