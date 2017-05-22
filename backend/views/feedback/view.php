<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Feedback */

$this->title = Yii::t('backend', 'Feedback');
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Feedback'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="feedback-view">

    <p>
        <?php echo Html::a(Yii::t('backend', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?php echo Html::a(Yii::t('backend', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('backend', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?php echo DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            
            [
                'attribute' => 'name',
                'label' => Yii::t('backend', 'Name')
            ],
            [
                'attribute' => 'phone',
                'label' => Yii::t('backend', 'Phone')
            ],
            [
                
                'attribute' => 'datetime',
                'label' => Yii::t('backend', 'Datetime')
            ],
            
            
            'email:email',
            [
                'attribute' => 'check',
                'label' => Yii::t('backend', 'Revised')
            ],
            
        ],
    ]) ?>

</div>
