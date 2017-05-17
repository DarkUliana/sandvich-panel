<?php

/** @var $this \yii\web\View */
/** @var $form \yii\widgets\ActiveForm */
/** @var $model \yii\db\ActiveRecord */
/** @var $lang string */
/** @var $langName string */
?>

<?= $form->field($model, "[$lang]title")->label($model->getAttributeLabel('title') . ' (' . $langName . ')')->textInput(['maxlength' => true]) ?>

