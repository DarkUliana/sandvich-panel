<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Checkerboard */

$this->title = 'Create Checkerboard';
$this->params['breadcrumbs'][] = ['label' => 'Checkerboards', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="checkerboard-create">

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
