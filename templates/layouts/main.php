<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?= $title ?></title>
</head>
<body>
	<header>
	</header>
		<!-- Require your file -->
		<?php require_once BASE_DIR . '/templates/sites/' . ACTIVE_APP . '/' . $view . '.php'; ?>

	<footer>
	</footer>
</body>
</html>