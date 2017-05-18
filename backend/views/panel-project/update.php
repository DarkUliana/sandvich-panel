<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\PanelProject */

$this->title = Yii::t('backend', 'Update panel project', [
    'modelClass' => 'Panel Project',
]) . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Panel projects'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('backend', 'Update');
?>
<div class="panel-project-update">

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
