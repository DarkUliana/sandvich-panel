<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\PanelProject */

$this->title = 'Update Panel Project: ' . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Panel Projects', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="panel-project-update">

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
