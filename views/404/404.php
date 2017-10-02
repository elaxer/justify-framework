<?php use justify\framework\modules\Debug; ?>
<!DOCTYPE html>
<html lang="<?= $lang ?>">
<!-- Requires head -->
<?php
$title = 'Page not found!';
require_once BASE_DIR . '/views/layouts/head.php';
?>
<body>
<div id="content">
    <!-- Requires header -->
    <?php require_once BASE_DIR . '/views/layouts/header.php'; ?>

    <div class="container">
        <h1 style="color: red;">ERROR 404!</h1>
        <h3>The search page was not found!</h3>
    </div>

    <!-- Requires footer -->
    <?php require_once BASE_DIR . '/views/layouts/footer.php' ?>
</div>

<?php Debug::debuggingPanel() ?>

</body>
</html>
