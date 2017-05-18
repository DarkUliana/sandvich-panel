<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Checkerboard */

$this->title = Yii::t('backend', 'Create advantages of sandwich panels');
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Checkerboards'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="checkerboard-create">

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
