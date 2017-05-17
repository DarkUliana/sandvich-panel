<?php

/** @var $this \yii\web\View */
/** @var $items array */
?>

<div class="nav-tabs-custom">
    <?= \yii\bootstrap\Tabs::widget([
        'items' => $items,
    ]) ?>
</div>