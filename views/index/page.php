<?php
/* @var $page */
?>
<div class="col-md-6">
    <h2>Page number <?= $page ?></h2>
    <p>
        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium aliquam esse nemo perferendis porro
        quaerat
        repudiandae. Fugiat nihil non omnis. A accusamus assumenda blanditiis cum earum, eveniet exercitationem fugiat,
        fugit minus officia officiis provident, quaerat repellendus tenetur veniam? Ad aperiam autem dignissimos, error
        inventore ipsa ipsum itaque perferendis veniam voluptates!
    </p>
    <?php if ($page <= 1): ?>
        <a href="/page/<?= $page + 1 ?>">Next page</a>
    <?php else: ?>
        <a href="/page/<?= $page - 1 ?>" class="prev_page">Previous page </a>
        <a href="/page/<?= $page + 1 ?>">Next page</a>
    <?php endif; ?>
</div>