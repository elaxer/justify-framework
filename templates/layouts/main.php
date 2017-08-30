<!DOCTYPE html>
<html lang="<?= $lang ?>">
<head>
    <meta charset="<?= $charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="<?= @$description ?>">
    <meta name="author" content="<?= @$author ?>">
    <meta name="keywords" content="<?= @$keywords ?>">

    <title><?= $title ?></title>

    <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script src="/components/js/debugging_panel.js"></script>
    <link rel="stylesheet" href="/components/css/main.css">
    <link rel="stylesheet" href="/components/css/adaptive.css">

</head>

<body>
<div id="content">
    <div class="navbar navbar-inverse" style="border-radius: 0">
        <div class="container">
            <div class="navbar-header">
                <a href="/" class="navbar-brand">Juftify</a>
            </div>
        </div>
    </div>
    <!-- Require content -->
    <?php require_once BASE_DIR . '/templates/sites/' . ACTIVE_APP . '/' . $view . '.php'; ?>

    <hr>
    <div class="container">
        <footer>
            <p>&copy; Justify Framework <?= date('Y'); ?></p>
        </footer>
    </div> <!-- /container -->
</div>

<?php debugging_panel() ?>

</body>
</html>
