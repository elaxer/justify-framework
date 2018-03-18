<?php
/* @var $frameworkName */
/* @var $frameworkVersion */
use Justify\System\Html;
$this->title = "Justify Framework $frameworkVersion";
?>
<div class="container">
    <div class="starter-template">
        <h1>Congratulations!</h1>
        <p class="lead">
            Welcome to <?= Html::encode($frameworkName) ?> <?= Html::encode($frameworkVersion) ?>!
        </p>
    </div>
    <div class="row">
        <div class="col-md-4">
            <h2>Example</h2>
            <p>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. A beatae delectus deserunt distinctio eius
                enim, facere fugit in inventore ipsam laborum molestiae neque non quo soluta voluptate voluptates!
                Doloremque ducimus ipsa minima, nam sequi similique!
            </p>
            <a href="/example" class="btn btn-success">Example &raquo;</a>
        </div>
        <div class="col-md-4">
            <h2>About</h2>
            <p>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. A beatae delectus deserunt distinctio eius
                enim, facere fugit in inventore ipsam laborum molestiae neque non quo soluta voluptate voluptates!
                Doloremque ducimus ipsa minima, nam sequi similique!
            </p>
            <a href="/about" class="btn btn-success">About &raquo;</a>
        </div>
        <div class="col-md-4">
            <h2>Contacts</h2>
            <p>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. A beatae delectus deserunt distinctio eius
                enim, facere fugit in inventore ipsam laborum molestiae neque non quo soluta voluptate voluptates!
                Doloremque ducimus ipsa minima, nam sequi similique!
            </p>
            <a href="/contacts" class="btn btn-success">Contacts &raquo;</a>
        </div>
    </div>
</div>