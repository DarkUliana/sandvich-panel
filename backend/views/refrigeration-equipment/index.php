<?php

use yii\grid\GridView;
use common\models\RefrigerationEquipment;
use \yii\widgets\Pjax;
use \backend\helpers\Html;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\RefrigerationEquipmentSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('backend', 'Refrigeration equipment');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="refrigeration-equipment-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?php echo Html::a(Yii::t('backend', 'Create refrigeration equipment'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php echo GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'title',
            [
                'attribute' => 'active',
                'filter' => RefrigerationEquipment::statuses(),
                'content' => function ($model) {
                    /** @var $model WidgetText */
                    $text = $model->active ? Yii::t('backend', "Active") : Yii::t('backend', "Inactive");
                    $title = $model->active ? Yii::t('backend', "Set inactive") : Yii::t('backend', "Set active");
                    $class = $model->active ? 'success' : 'warning';
                    return Html::a($text, ['index', 'id' => $model->id, 'active' => !$model->active], [
                        'class' => 'btn btn-sm btn-' . $class,
                        'title' => $title,
                        'alt' => $text,
                    ]);
                },
            ],


            [
                'class' => 'yii\grid\ActionColumn',
                'template'=>'{update} {delete}',
                'header' => Html::clearSearchLink([
                    'except' => ['id', 'active', '_pjax'],
                    ]),
            ],
        ],
    ]); ?>
    <?php Pjax::end(); ?>

</div>
