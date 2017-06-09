<?php

/* @var $this \yii\web\View */
/** @var $model \frontend\forms\FeedbackForm */
?>
<div class="ownbox-content form form-content">
    <a class="ownbox-close" href="javascript:void(0);"></a>
    <div class="ownbox-title"><?= Yii::t('frontend', 'Get a call') ?></div>
    <div class="ownbox-description"><?= Yii::t('frontend', 'Our managers will contact you shortly') ?></div>
    <?php $form = \yii\bootstrap\ActiveForm::begin([
        'enableClientValidation' => true,
        'validateOnBlur' => true,
        'validateOnChange' => true,
        'validateOnSubmit' => true,
    ]); ?>
        <div class="ownbox-field ownbox-field--user">
            <?= $form->field($model, 'name', [
                'template' => '{input}',
            ])->textInput([
                'class' => 'ownbox-field-input',
                'maxlength' => true,
                'placeholder' => Yii::t('frontend', 'Enter your name'),
            ]) ?>
        </div>

        <div class="ownbox-field ownbox-field--phone">
            <?= $form->field($model, 'phone', [
                'template' => '{input}',
            ])->widget(\yii\widgets\MaskedInput::className(), [
                'mask' => '+38 - (999) - 999 - 99 - 99',
                'options' => [
                    'id' => 'click-feedback-phone',
                    'class' => 'ownbox-field-input',
                    'maxlength' => true,
                    'placeholder' => Yii::t('frontend', 'Enter your phone'),]
            ]) ?>
        </div>
    
        <div class="ownbox-field ownbox-field--email">
            <?= $form->field($model, 'email', [
                'template' => '{input}',
            ])->textInput([
                'class' => 'ownbox-field-input',
                'maxlength' => true,
                'placeholder' => Yii::t('frontend', 'Enter your message'),
            ]) ?>
        </div>
        <div class="ownbox-field">
            <input class="ownbox-field-button ajax-submit" type="button" value="Замовити">
        </div>
    <?php \yii\bootstrap\ActiveForm::end(); ?>
</div>