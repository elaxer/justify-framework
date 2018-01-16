<?php if (self::hasFlash()): ?>
<div class="alert alert-<?= self::$type ?> alert-dismissible" role="alert">
<?php if (self::$close): ?>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
<?php endif ?>
    <?= self::$message ?>
</div>
<?php endif ?>