<?php

use yii\grid\GridView;
use common\models\Menu;
use \yii\widgets\Pjax;
use \backend\helpers\Html;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\MenuSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

\yii\jui\JuiAsset::register($this);

$script = <<<JS
   var sortable = function() {
       $('tbody', '#mainGrid').sortable({
            update: function(event, ui) {
                // Assigns table tag
                var table = $(this).closest('table');
                // Collect data
                var data = {};
                var index = 1;
                table.find('tbody tr').each(function() {
                    data['positions[' + $(this).data('key') + ']'] = index;
                    ++index;
                });
                
                // Send request
                $.post(table.data('sort-url'), data);
            }
       });
   };

    $(document).ready(function() {
        sortable();
    });

    $(document).on('pjax:end', function() {
        sortable();
    });
JS;
$this->registerJs($script, \yii\web\View::POS_END);


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
        'id' => 'mainGrid',
        'tableOptions' => [
            'class' => 'table table-striped table-bordered sorted-table',
            'data' => [
                'sort-url' => Url::toRoute(['position']),
            ],
        ],
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
