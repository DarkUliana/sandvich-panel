<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\RefrigerationEquipment */

$this->title = Yii::t('backend', 'Update {modelClass}: ', [
    'modelClass' => 'Refrigeration Equipment',
]) . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Refrigeration Equipments'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('backend', 'Update');
?>
<div class="refrigeration-equipment-update">

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
