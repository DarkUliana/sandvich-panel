<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Phone */

$this->title = Yii::t('backend', 'Update phone') . ': ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Phones'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('backend', 'Update');
?>
<div class="phone-update">

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
