<?php

use yii\grid\GridView;
use common\models\WidgetText;
use \yii\widgets\Pjax;
use \backend\helpers\Html;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\WidgetTextSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('backend', 'Text Widgets');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="widget-text-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?php echo Html::a(Yii::t('backend', 'Create widget text'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [

            'id',
            'key',
            [
                'attribute' => 'status',
                'filter' => WidgetText::statuses(),
                'content' => function ($model) {
                    /** @var $model WidgetText */
                    $text = $model->status ? Yii::t('backend', "Active") : Yii::t('backend', "Inactive");
                    $title = $model->status ? Yii::t('backend', "Set inactive") : Yii::t('backend', "Set active");
                    $class = $model->status ? 'success' : 'warning';
                    return Html::a($text, ['index', 'id' => $model->id, 'status' => !$model->status], [
                        'class' => 'btn btn-sm btn-' . $class,
                        'title' => $title,
                        'alt' => $text,
                    ]);
                },
            ],
            // 'name',

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{update} {delete}',
                'header' => Html::clearSearchLink([
                    'except' => ['id', 'status', '_pjax'],
                ]),
            ],
        ],
    ]); ?>
    <?php Pjax::end(); ?>

</div>
