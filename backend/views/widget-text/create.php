<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\WidgetText */

$this->title = 'Create Widget Text';
$this->params['breadcrumbs'][] = ['label' => 'Widget Texts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="widget-text-create">

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
