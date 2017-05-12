<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\PanelProject */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Panel Projects', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="panel-project-view">

    <p>
        <?php echo Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?php echo Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?php echo DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            'image',
            'active',
            'position',
        ],
    ]) ?>

</div>
