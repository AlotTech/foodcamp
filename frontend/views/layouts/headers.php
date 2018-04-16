  <?php
use yii\helpers\Html;

/* @var $this \yii\web\View */
/* @var $content string */
?>
  <!-- Navigation -->
    <nav class="navbar navbar-light bg-light static-top">
      <div class="container">

    <?= Html::a(Html::img('@web/logo.png', ['width'=>'100','height'=>'50']), Yii::$app->homeUrl, ['class' => 'logo']) ?>
<?php if (Yii::$app->user->isGuest){ ?>
	<div class="pull-right">
       <?= Html::a(Yii::t('app', 'Daftar'), ['/user/register'], ['class' => 'btn btn-lg btn-primary']) ?> 
        <?= Html::a(Yii::t('app', 'Login'), ['/user/login'], ['class' => 'btn btn-lg btn-primary']) ?>
     </div>
      <?php } ?>

      </div>
    </nav>