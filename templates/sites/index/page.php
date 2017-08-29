<div class="container">
    <h2>Page number <?= $page ?></h2>
	<?php if ($page <= 1): ?>
		<a href="/page/<?= $page + 1?>">Next page</a>
	<?php else: ?>
		<a href="/page/<?= $page - 1 ?>" style="margin-right: 7px;">Previous page </a> <a href="/page/<?= $page + 1 ?>"> Next page</a>
	<?php endif; ?>	
</div>