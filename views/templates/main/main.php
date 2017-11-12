<?php
/* @var $lang */
use Justify\System\Html;
?>
<!DOCTYPE html>
<html lang="<?= $lang ?>">
<!-- Requires head -->
<?php require_once HEAD; ?>
<body>
<div id="content">
    <!-- Requires header -->
    <?php require_once HEADER; ?>

    <div class="container">
        <!-- Requires content -->
        <?php require_once CONTENT; ?>
    </div>

    <!-- Requires footer -->
    <?php require_once FOOTER; ?>
</div>

<?php Html::debuggingPanel() ?>

</body>
</html>