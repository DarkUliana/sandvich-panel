<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\WidgetText */

$this->title = Yii::t('backend', 'Update widget text') . ': ' .  $model->key;
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Text Widgets'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->key, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('backend', 'Update');
?>
<div class="widget-text-update">

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
