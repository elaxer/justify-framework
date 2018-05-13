<?php
use Justify\Widgets\Breadcrumbs;
use Justify\Components\Lang;

$this->title = Lang::get('contacts.contacts');
?>
<?= Breadcrumbs::render([
    Lang::get('contacts.home') => Justify::$home,
    $this->title => ''
]) ?>
<h2><?= Lang::get('contacts.contacts') ?></h2>
<p>
    <?= Lang::get('contacts.lorem') ?>
</p>