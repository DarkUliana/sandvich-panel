<?php

use yii\grid\GridView;
use common\models\Menu;
use \yii\widgets\Pjax;
use \backend\helpers\Html;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\MenuSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('backend', 'Menu');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="menu-index">

    <p>
        <?php echo Html::a(Yii::t('backend', 'Create element of menu'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    
    <?php Pjax::begin(); ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [

            'id',
            'title',
            'slug',
            [
                'attribute' => 'active',
                'filter' => Menu::statuses(),
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
            // 'name',

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{update} {delete}',
                'header' => Html::clearSearchLink([
                    'except' => ['id', 'active', '_pjax'],
                ]),
            ],
        ],
    ]); ?>
    <?php Pjax::end(); ?>

</div>
