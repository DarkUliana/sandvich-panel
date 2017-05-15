<?php

use backend\helpers\Html;
use yii\grid\GridView;

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

    <?php echo GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [

            'id',
            'name',
            'phone',
            'email:email',
            'datetime',
            [
                'attribute' => 'check',
                'filter' => \common\models\Feedback::statuses(),
                'content' => function ($model) {
                    /** @var $model \common\models\Feedback */
                    $text = $model->status ? Yii::t('common', "Checked") : Yii::t('common', "Not checked");
                    $title = $model->status ? Yii::t('common', "Set not checked") : Yii::t('common', "Set checked");
                    $class = $model->status ? 'success' : 'warning';
                    return Html::a($text, ['index', 'id' => $model->id, 'status' => !$model->status], [
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

</div>
