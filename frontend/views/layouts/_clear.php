<?php
use yii\helpers\Html;
/* @var $this \yii\web\View */
/* @var $content string */

\frontend\assets\FrontendAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?php echo Yii::$app->language ?>">
<head>
    <meta charset="<?php echo Yii::$app->charset ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="favicon.ico">
    <title><?php echo Html::encode($this->title) ?></title>
    <?php $this->head() ?>
    <?php echo Html::csrfMetaTags() ?>
    <script type="text/javascript" language="JavaScript">CI_ROOT = '<?= rtrim(Yii::$app->homeUrl, '/'), '/' ?>';</script>
</head>
<body>
<?php $this->beginBody() ?>
    <?php echo $content ?>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
