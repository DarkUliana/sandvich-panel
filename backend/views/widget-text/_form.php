<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\WidgetText */
/* @var $form yii\bootstrap\ActiveForm */
?>

<div class="widget-text-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php echo $form->errorSummary($model); ?>

    <?php echo $form->field($model, 'key')->textInput(['maxlength' => true]) ?>
    
    <?= \backend\widgets\TranslationWidget::widget([
        'activeForm' => $form,
        'modelObj' => $model,
        'translationClass' => \common\models\translation\WidgetTextTranslation::className(),
        'view' => '_form_lang',
    ]) ?>
    
    <?php echo $form->field($model, 'status')->label(Yii::t('backend', "Active"))->checkbox() ?>

    <div class="form-group">
        <?php echo Html::submitButton($model->isNewRecord ? Yii::t('backend', 'Create') : Yii::t('backend', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
