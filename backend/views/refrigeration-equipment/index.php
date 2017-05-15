<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\RefrigerationEquipmentSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('backend', 'Refrigeration equipment');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="refrigeration-equipment-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?php echo Html::a(Yii::t('backend', 'Create refrigeration equipment', [
    'modelClass' => 'Refrigeration Equipment',
]), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php echo GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'image',
            'active',
            'position',

            ['class' => 'yii\grid\ActionColumn',],
        ],
    ]); ?>

</div>
