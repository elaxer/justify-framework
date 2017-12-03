<?php
/* @var $title */
?>
    <base href="<?= Justify::$web ?>">
    <meta charset="<?= Justify::$charset ?>">
<?php foreach (Justify::$settings['components']['js'] as $js): ?>
    <script src="<?= $js ?>"></script>
<?php endforeach; ?>

<?php foreach (Justify::$settings['components']['css'] as $css): ?>
    <link rel="stylesheet" href="<?= $css ?>">
<?php endforeach;
