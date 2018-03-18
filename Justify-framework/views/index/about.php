<?php
use Justify\Widgets\Breadcrumbs;
$this->title = 'About';
?>
<?= Breadcrumbs::render([
    'Home' => Justify::$home,
    $this->title => ''
]) ?>
<h2>About</h2>
<p>
    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam atque eos nesciunt sint vitae. Minima, quidem
    similique. A culpa cum debitis excepturi expedita nam nesciunt odit perferendis rem sequi. Adipisci amet aperiam
    aspernatur eaque harum inventore laudantium magnam magni molestiae neque nostrum odio optio perferendis qui,
    quibusdam, quidem, quos rem repudiandae rerum temporibus velit veniam voluptatum. Adipisci alias autem deserunt
    doloribus et eveniet libero magnam modi molestiae officiis quidem, quis repudiandae suscipit vitae voluptate.
    Aliquam aut commodi dignissimos eos expedita libero minima minus, quae quas qui quod similique sunt suscipit tenetur
    veniam voluptatem voluptatibus! Dolor ducimus est quae sed ut.
</p>