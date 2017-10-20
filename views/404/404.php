<?php use justify\framework\system\Html; ?>
<!DOCTYPE html>
<html lang="<?= $lang ?>">
<!-- Requires head -->
<?php
$title = 'Page not found!';
require_once HEAD;
?>
<body>
<div id="content">
    <!-- Requires header -->
    <?php require_once HEADER ?>

    <div class="container">
        <h1 style="color: red;">ERROR 404!</h1>
        <h3>The search page was not found!</h3>
    </div>

    <!-- Requires footer -->
    <?php require_once FOOTER ?>
</div>

<?php Html::debuggingPanel() ?>

</body>
</html>