<?php /* @var $pagination */ ?>
<nav aria-label="...">
    <ul class="pager">
        <li class="previous <?= $pagination->currentPage <= 1 ? 'disabled' : '' ?>">
        <?php if ($pagination->currentPage > 1): ?>
            <a href="<?= $pagination->url . ($pagination->currentPage - 1) ?>">
        <?php endif ?>
                <span aria-hidden="true">&larr; <?= $previous ?></span>
        <?php if ($pagination->currentPage >= 1): ?>
            </a>
        <?php endif ?>
        </li>
        <li class="next <?= $pagination->currentPage == $pagination->countOfPages ? 'disabled' : '' ?>">
        <?php if ($pagination->currentPage != $pagination->countOfPages): ?>
            <a href="<?= $pagination->url . ($pagination->currentPage + 1)  ?>">
        <?php endif ?>
                 <span aria-hidden="true"><?= $next ?> &rarr;</span>
        <?php if ($pagination->currentPage != $pagination->countOfPages): ?>
            </a>
        <?php endif ?>
        </li>
    </ul>
</nav>