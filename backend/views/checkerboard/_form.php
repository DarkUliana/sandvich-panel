<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use common\models\translation\CheckerboardTranslation;
use trntv\filekit\widget\Upload;

/* @var $this yii\web\View */
/* @var $model common\models\Checkerboard */
/* @var $form yii\bootstrap\ActiveForm */
?>

<div class="checkerboard-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php echo $form->errorSummary($model); ?>

    <?= \backend\widgets\TranslationWidget::widget([
        'activeForm' => $form,
        'modelObj' => $model,
        'translationClass' => CheckerboardTranslation::className(),
        'view' => '_form_lang',
    ]) ?>
    
    <?php echo $form->field($model, 'mainImage')->widget(
        Upload::className(),
        [
            'url' => ['/file-storage/upload'],
            'maxFileSize' => 5000000, // 5 MiB
        ]);
    ?>
    
    <?php echo $form->field($model, 'active')->checkbox() ?>
    
    <div class="form-group">
        <?php echo Html::submitButton($model->isNewRecord ? Yii::t('backend', 'Create') : Yii::t('backend', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
