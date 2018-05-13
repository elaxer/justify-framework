<?php
/* @var $frameworkName */
/* @var $frameworkVersion */

use Justify\Components\Lang;
use Justify\System\Html;

$this->title = "Justify Framework $frameworkVersion";
?>
<div class="container">
    <div class="starter-template">
        <h1><?= Lang::get('index.welcome') ?>!</h1>
        <p class="lead">
            <?= Lang::get('index.successful') ?>
            <?= Html::encode($frameworkName) ?>
            <?= Html::encode($frameworkVersion) ?>!
        </p>
    </div>
    <div class="row">
        <div class="col-md-4">
            <h2><?= Lang::get('index.example') ?></h2>
            <p>
                <?= Lang::get('index.lorem') ?>
            </p>
            <a href="/example" class="btn btn-success"><?= Lang::get('index.example') ?> &raquo;</a>
        </div>
        <div class="col-md-4">
            <h2><?= Lang::get('index.about') ?></h2>
            <p>
                <?= Lang::get('index.lorem') ?>
            </p>
            <a href="/about" class="btn btn-success"><?= Lang::get('index.about') ?> &raquo;</a>
        </div>
        <div class="col-md-4">
            <h2><?= Lang::get('index.contacts') ?></h2>
            <p>
                <?= Lang::get('index.lorem') ?>
            </p>
            <a href="/contacts" class="btn btn-success"><?= Lang::get('index.contacts') ?> &raquo;</a>
        </div>
    </div>
</div>