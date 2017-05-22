<?php

use \backend\helpers\Html;

/** @var $this \yii\web\View */
/** @var $model \common\models\Feedback */
?>

<?php echo Yii::t('frontend', 'Date') ?>: <?php echo Yii::$app->formatter->asDatetime($model->datetime, 'php:d.m.Y H:i:s') ?><br>

<?php echo Yii::t('frontend', 'Name') ?>: <?php echo $model->name ?><br>

<?php echo Yii::t('frontend', 'Phone') ?>: <?php echo $model->phone ?><br>

<?php echo Yii::t('frontend', 'Email') ?>: <?php echo $model->email ?><br>

<?= Html::a(Yii::t('frontend', "Detail"), Yii::$app->urlManagerBackend->createAbsoluteUrl(['feedback/update', 'id' => $model->id])) ?>
