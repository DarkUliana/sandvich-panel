<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\RefrigerationEquipment */

$this->title = 'Create Refrigeration Equipment';
$this->params['breadcrumbs'][] = ['label' => 'Refrigeration Equipments', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="refrigeration-equipment-create">

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
