<?php
/* @var $content */
/* @var $title */
use Justify\System\Html;
?>
<!DOCTYPE html>
<html lang="<?= Justify::$lang ?>">

<head>
    <?= Html::head()  ?>
    <title><?= $title ?></title>
</head>
<body>

<div class="wrapper">

    <div class="content">
        <div class="navbar navbar-inverse">
            <div class="container">
                <div class="navbar-header">
                    <a href="<?= Justify::$home ?>" class="navbar-brand">Justify</a>
                </div>
            </div>
        </div>

        <div class="container">
            <?php require_once $content ?>
        </div>
    </div>

    <footer>
        <hr>
        <div class="container">
            <p>&copy; Justify Framework <?= date('Y') ?></p>
        </div>
    </footer>

</div>
<?= Html::debuggingPanel() ?>
</body>
</html>