<?php use justify\framework\modules\Debug; ?>
<!DOCTYPE html>
<html lang="<?= $lang ?>">
<!-- Requires head -->
<?php require_once BASE_DIR . '/views/layouts/head.php'; ?>
<body>
<div id="content">
    <!-- Requires header -->
    <?php require_once BASE_DIR . '/views/layouts/header.php'; ?>

    <div class="container">
        <!-- Requires content -->
        <?php require_once BASE_DIR . '/views/sites/' . ACTIVE_APP . '/' . $view . '.php' ?>
    </div>

    <!-- Requires footer -->
    <?php require_once BASE_DIR . '/views/layouts/footer.php' ?>
</div>

<?php Debug::debuggingPanel() ?>

</body>
</html>