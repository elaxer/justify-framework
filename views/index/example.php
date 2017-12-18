<?php
/* @var $page */
/* @var $pagination */
use Justify\Widgets\Breadcrumbs;
use Justify\Widgets\SimplePagination;
$this->title = 'Example | Page ' . $pagination->currentPage;
?>
<?= Breadcrumbs::render([
    'Home' => Justify::$home,
    'Example' => ''
]) ?>
<div class="col-md-6">
    <h2>Page number <?= $pagination->currentPage ?></h2>
    <p>
        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium aliquam esse nemo perferendis porro
        quaerat
        repudiandae. Fugiat nihil non omnis. A accusamus assumenda blanditiis cum earum, eveniet exercitationem fugiat,
        fugit minus officia officiis provident, quaerat repellendus tenetur veniam? Ad aperiam autem dignissimos, error
        inventore ipsa ipsum itaque perferendis veniam voluptates!
    </p>
    <?= SimplePagination::render($pagination) ?>
</div>