<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Phone */

$this->title = Yii::t('backend', 'Create phone');
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Phones'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="phone-create">

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
