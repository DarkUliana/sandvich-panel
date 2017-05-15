<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Checkerboard */

$this->title = 'Update Checkerboard: ' . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Checkerboards', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="checkerboard-update">

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
