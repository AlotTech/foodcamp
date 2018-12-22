<?php

/* @var $this \yii\web\View */
/* @var $content string */

use frontend\assets\HomeAsset;
use yii\helpers\Html;

HomeAsset::register($this);

?>

<?php $this->beginPage()?>
<!DOCTYPE html>
<html lang="<?php echo Yii::$app->language?>">
<head>
    <meta charset="<?php echo Yii::$app->charset?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php echo Html::csrfMetaTags()?>
    <title><?php echo Html::encode($this->title)?></title>
    <?php $this->head()?>
</head>
<body>
<?php $this->beginBody()?>

<?php echo $this->render(
    'hheaderd.php'
)?>

<?php echo $content?>

<?php echo $this->render(
    'hfooters.php'
)?>

<?php $this->endBody()?>
</body>
</html>
<?php $this->endPage()?>
