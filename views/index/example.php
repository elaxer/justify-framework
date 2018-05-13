<?php
/* @var $page */
/* @var $pagination */

use Justify\Widgets\Breadcrumbs;
use Justify\Widgets\SimplePagination;
use Justify\Components\Lang;

$this->title = Lang::get('example.example')
    . ' | ' . Lang::get('example.page')
    .  ' ' . $pagination->currentPage;
?>
<?= Breadcrumbs::render([
    Lang::get('example.home') => Justify::$home,
    Lang::get('example.example') . "({$pagination->currentPage} "
        . Lang::get('example.of') . " {$pagination->lastPage})" => ''
]) ?>
<div class="col-md-6">
    <h2><?= Lang::get('example.page_number') ?> <?= $pagination->currentPage ?></h2>
    <p>
        <?= Lang::get('example.lorem') ?>
    </p>
    <?= SimplePagination::render($pagination, Lang::get('example.prev'), Lang::get('example.next')) ?>
</div>