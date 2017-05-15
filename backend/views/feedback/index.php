<?php

use backend\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\FeedbackSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('backend', 'Feedbacks');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="feedback-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?php /*echo Html::a(Yii::t('backend', 'Create {modelClass}', [
    'modelClass' => 'Feedback',
]), ['create'], ['class' => 'btn btn-success'])*/ ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php echo GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [

            'id',
            'name',
            'phone',
            'email:email',
            [
                'attribute' => 'datetime',
                'filter' => kartik\daterange\DateRangePicker::widget([
                    'model' => $searchModel,
                    'attribute' => 'datetime_range',
                    'pluginOptions' => [
                        'locale' => [
                            'format' => 'DD.MM.YYYY',
                        ],
                        'opens' => 'left',
                    ],
                ]),
                'content' => function($model) {
                    return Yii::$app->formatter->asDateTime($model->datetime, 'php:d.m.Y H:i:s');
                },
            ],
            [
                'attribute' => 'check',
                'filter' => \common\models\Feedback::statuses(),
                'content' => function ($model) {
                    /** @var $model \common\models\Feedback */
                    $text = $model->check ? Yii::t('common', "Checked") : Yii::t('common', "Not checked");
                    $title = $model->check ? Yii::t('common', "Set not checked") : Yii::t('common', "Set checked");
                    $class = $model->check ? 'success' : 'warning';
                    return Html::a($text, ['index', 'id' => $model->id, 'status' => !$model->check], [
                        'class' => 'btn btn-sm btn-' . $class,
                        'title' => $title,
                        'alt' => $text,
                    ]);
                },
            ],

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
