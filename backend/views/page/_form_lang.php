<?php

use yii\helpers\Html;

/** @var $this \yii\web\View */
/** @var $form \yii\widgets\ActiveForm */
/** @var $model \yii\db\ActiveRecord */
/** @var $lang string */
/** @var $langName string */
?>

<?= $form->field($model, "[$lang]title")->label($model->getAttributeLabel('title') . ' (' . $langName . ')')->textInput(['maxlength' => true]) ?>

<h4><?= Html::a(Yii::t('backend', "SEO") . ' <span class="caret"></span>', 'javascript:void(0);', [
        'class' => 'slide-link',
        'data' => [
            'target' => '.seo-container',
        ],
    ]) ?></h4>
<div class="panel panel-default seo-container">
    <div class="panel-body">
        <?= $form->field($model, "[$lang]tkd_title")->label($model->getAttributeLabel('tkd_title') . ' (' . $langName . ')')->textInput(['maxlength' => true]) ?>
        <?= $form->field($model, "[$lang]tkd_keyword")->label($model->getAttributeLabel('tkd_keyword') . ' (' . $langName . ')')->textInput(['maxlength' => true]) ?>
        <?= $form->field($model, "[$lang]tkd_description")->label($model->getAttributeLabel('tkd_description') . ' (' . $langName . ')')->textarea(['maxlength' => true]) ?>
    </div>
</div>

<?= $form->field($model, "[$lang]body")->label($model->getAttributeLabel('body') . ' (' . $langName . ')')->widget(
    \yii\imperavi\Widget::className(),
    [
        'plugins' => ['fullscreen', 'fontcolor', 'video'],
        'options'=>[
            'minHeight' => 400,
            'maxHeight' => 400,
            'buttonSource' => true,
            'imageUpload' => Yii::$app->urlManager->createUrl(['/file-storage/upload-imperavi'])
        ]
    ]
) ?>