<?php
/* @var $array */
/* @var $selected */
?>
<?php foreach ($array as $key => $value): ?>
    <option <?= $key === $selected ? 'selected' : '' ?> value="<?= $key ?>"><?= $value ?></option>
<?php endforeach; ?>