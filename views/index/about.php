<?php
use Justify\Widgets\Breadcrumbs;
use Justify\Components\Lang;
$this->title = Lang::get('about.about');
?>
<?= Breadcrumbs::render([
    Lang::get('about.home') => Justify::$home,
    $this->title => ''
]) ?>
<h2><?= Lang::get('about.about') ?></h2>
<p>
    <?= Lang::get('about.lorem') ?>
</p>