<?php

/* @var $this \yii\web\View */
/** @var $model \frontend\forms\FeedbackForm */
?>
<div class="ownbox-content form form-content">
    <a class="ownbox-close" href="javascript:void(0);"></a>
    <div class="ownbox-title">Замовити дзвінок</div>
    <div class="ownbox-description">Ми обов'язково зв'яжемося з Вами протягом 5 хвилин</div>
    <?php $form = \yii\bootstrap\ActiveForm::begin([
        'enableAjaxValidation' => true,
    ]); ?>
        <div class="ownbox-field ownbox-field--user">
            <?= $form->field($model, 'name', [
                'template' => '{input}',
            ])->textInput([
                'class' => 'ownbox-field-input',
                'maxlength' => true,
                'placeholder' => "Введіть Ваше ім`я",
            ]) ?>
        </div>
        <div class="ownbox-field ownbox-field--email">
            <?= $form->field($model, 'email', [
                'template' => '{input}',
            ])->textInput([
                'class' => 'ownbox-field-input',
                'maxlength' => true,
                'placeholder' => "Введіть Ваш email",
            ]) ?>
        </div>
        <div class="ownbox-field ownbox-field--phone">
            <?= $form->field($model, 'phone', [
                'template' => '{input}',
            ])->textInput([
                'class' => 'ownbox-field-input',
                'maxlength' => true,
                'placeholder' => "Введіть Ваш телефон",
            ]) ?>
        </div>
        <div class="ownbox-field">
            <input class="ownbox-field-button ajax-submit" type="button" value="Замовити">
        </div>
    <?php \yii\bootstrap\ActiveForm::end(); ?>
</div>