<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Feedback */

$this->title = Yii::t('backend', 'Create feedback');
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Feedbacks'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="feedback-create">

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
