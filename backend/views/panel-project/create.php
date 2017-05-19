<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\PanelProject */

$this->title = Yii::t('backend', 'Create panel project');
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Panel projects'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="panel-project-create">

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
