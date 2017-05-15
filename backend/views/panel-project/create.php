<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\PanelProject */

$this->title = Yii::t('backend', 'Create {modelClass}', [
    'modelClass' => 'Panel Project',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Panel Projects'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="panel-project-create">

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
