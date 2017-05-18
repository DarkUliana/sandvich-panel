<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\WidgetText */

$this->title = Yii::t('backend', 'Create widget text');
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Text Widgets'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="widget-text-create">

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
