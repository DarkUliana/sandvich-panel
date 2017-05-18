<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\RefrigerationEquipment */

$this->title = Yii::t('backend', 'Create refrigeration equipment', [
    'modelClass' => 'Refrigeration Equipment',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Refrigeration equipment'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="refrigeration-equipment-create">

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
