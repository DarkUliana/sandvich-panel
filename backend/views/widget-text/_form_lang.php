<?php

/** @var $this \yii\web\View */
/** @var $form \yii\widgets\ActiveForm */
/** @var $model \yii\db\ActiveRecord */
/** @var $lang string */
/** @var $langName string */
?>

<?= $form->field($model, "[$lang]title")->label($model->getAttributeLabel('title') . ' (' . $langName . ')')->textInput(['maxlength' => true]) ?>

<?php echo $form->field($model, "[$lang]body")->label($model->getAttributeLabel('body') . ' (' . $langName . ')')->widget(
    \yii\imperavi\Widget::className(),
    [
        'plugins' => ['fullscreen', 'fontcolor', 'video'],
        'options' => [
            'minHeight' => 400,
            'maxHeight' => 400,
            'buttonSource' => true,
            'convertDivs' => false,
            'removeEmptyTags' => false,
            'imageUpload' => Yii::$app->urlManager->createUrl(['/file-storage/upload-imperavi'])
        ]
    ]
) ?>