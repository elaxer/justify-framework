<?php use justify\framework\modules\Debug; ?>
<!DOCTYPE html>
<html lang="<?= $lang ?>">
<!-- Requires head -->
<?php require_once VIEWS_DIR . '/layouts/head.php' ?>
<body>
<div id="content">
    <!-- Requires header -->
    <?php require_once VIEWS_DIR . '/layouts/header.php' ?>

    <div class="container">
        <!-- Requires content -->
        <?php require_once VIEWS_DIR . '/' . ACTIVE_APP . '/' . $view . '.php' ?>
    </div>

    <!-- Requires footer -->
    <?php require_once VIEWS_DIR . '/layouts/footer.php' ?>
</div>

<?php Debug::debuggingPanel() ?>

</body>
</html>