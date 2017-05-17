<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\models\Page;
use \yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel \backend\models\search\PageSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('backend', 'Pages');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="page-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        
        
        
        <?php echo Html::a(Yii::t('backend', 'Create {modelClass}', [
    'modelClass' => 'Page',
]), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    
    <?php echo GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'options' => [
            'class' => 'grid-view table-responsive'
        ],
        'columns' => [
            'id',
            'title',
            'slug',
            [
                'attribute' => 'status',
                'filter' => Page::statuses(),
                'content' => function ($model) {
                    /** @var $model WidgetText */
                    $text = $model->status ? Yii::t('common', "Active") : Yii::t('common', "Inactive");
                    $title = $model->status ? Yii::t('common', "Set inactive") : Yii::t('common', "Set active");
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
                'template'=>'{update} {delete}'
            ],
        ],
    ]); ?>
    
    <?php Pjax::end(); ?>

</div>
