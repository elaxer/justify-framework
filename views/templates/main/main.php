<?php
/* @var $content */
/* @var $title */
use Justify\System\Html;
?>
<!DOCTYPE html>
<html lang="<?= Justify::$settings['html']['lang'] ?>">

<head>
    <base href="<?= Justify::$settings['webPath'] ?>">
    <meta charset="<?= Justify::$settings['html']['charset'] ?>">
    <title><?= $title ?></title>
    <?php Html::components() ?>
</head>

<body>

<div class="wrapper">

    <div class="content">
        <div class="navbar navbar-inverse" style="border-radius: 0">
            <div class="container">
                <div class="navbar-header">
                    <a href="/" class="navbar-brand">Juftify</a>
                </div>
            </div>
        </div>

        <div class="container">
            <!-- Requires content -->
            <?php require_once $content ?>
        </div>
    </div>

    <footer>
        <hr>
        <div class="container">
            <p>&copy; Justify Framework <?= date('Y') ?></p>
        </div> <!-- /container -->
    </footer>

</div>
<?= Html::debuggingPanel() ?>
</body>
</html>