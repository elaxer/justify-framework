<?php /* @var $breadcrumbs */ ?>
<ol class="breadcrumb">
<?php foreach ($breadcrumbs as $item => $link): ?>
    <?php if ($link): ?>
        <li><a href="<?= $link ?>"><?= $item ?></a></li>
    <?php else: ?>
        <li class="active"><?= $item ?></li>
    <?php endif; ?>
<?php endforeach; ?>
</ol>