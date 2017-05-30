<?php

use yii\grid\GridView;
use common\models\Phone;
use \yii\widgets\Pjax;
use \backend\helpers\Html;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\PhoneSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

\backend\assets\SortableAsset::register($this);

$this->title = Yii::t('backend', 'Phones');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="phone-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?php echo Html::a(Yii::t('backend', 'Create phone'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php echo GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'id' => 'mainGrid',
        'tableOptions' => [
            'class' => 'table table-striped table-bordered sorted-table',
            'data' => [
                'sort-url' => Url::toRoute(['position']),
            ],
        ],
        'columns' => [

            'id',
            'name',
            'phone',
            [
                'attribute' => 'active',
                'filter' => Phone::statuses(),
                'content' => function ($model) {
                    /** @var $model Phone */
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
