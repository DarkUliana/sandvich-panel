<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Checkerboard */

$this->title = Yii::t('backend', 'Update checkerboard') . ': ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Checkerboards'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('backend', 'Update');
?>
<div class="checkerboard-update">

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
