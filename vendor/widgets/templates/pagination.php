<?php /* @var $pagination */ ?>
<nav aria-label="...">
    <ul class="pagination">
        <li <?= $pagination->currentPage == 1 ? 'class="disabled"' : '' ?>>
        <?php if ($pagination->currentPage != 1): ?>
            <a href="?page=<?=$pagination->currentPage - 1 ?>" aria-label="Previous">
        <?php endif ?>
                <span aria-hidden="true">&laquo;</span>
        <?php if ($pagination->currentPage != 1): ?>
            </a>
        <?php endif ?>
        </li>
        <?php for ($i = $pagination->start; $i <= $pagination->end; $i++): ?>
        <li <?= $pagination->currentPage == $i ? 'class="active"' : '' ?>>
            <a href="<?= $pagination->url .  $i ?>"><?= $i ?></a>
        </li>
        <?php endfor ?>
        <li <?= $pagination->currentPage == $pagination->countOfPages ? 'class="disabled"' : '' ?>>
        <?php if ($pagination->currentPage != $pagination->countOfPages): ?>
            <a href="?page=<?= $pagination->currentPage + 1 ?>" aria-label="Next">
        <?php endif ?>
                <span aria-hidden="true">&raquo;</span>
        <?php if ($pagination->currentPage != $pagination->countOfPages): ?>
            </a>
        <?php endif ?>
        </li>
    </ul>
</nav>