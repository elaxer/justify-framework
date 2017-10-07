<?php use justify\framework\modules\Debug; ?>
<!DOCTYPE html>
<html lang="<?= $lang ?>">
<!-- Requires head -->
<?php
$title = 'Page not found!';
require_once VIEWS_DIR . '/layouts/head.php';
?>
<body>
<div id="content">
    <!-- Requires header -->
    <?php require_once VIEWS_DIR . '/layouts/header.php'; ?>

    <div class="container">
        <h1 style="color: red;">ERROR 404!</h1>
        <h3>The search page was not found!</h3>
    </div>

    <!-- Requires footer -->
    <?php require_once VIEWS_DIR . '/layouts/footer.php' ?>
</div>

<?php Debug::debuggingPanel() ?>

</body>
</html>
