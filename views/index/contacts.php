<?php
use Justify\Widgets\Breadcrumbs;
$this->title = 'Contacts';
?>
<?= Breadcrumbs::render([
    'Home' => Justify::$home,
    $this->title => ''
]) ?>
<h2>Contacts</h2>
<p>
    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi corporis id laudantium mollitia nisi nobis numquam
    quam quod rem tenetur!
</p>