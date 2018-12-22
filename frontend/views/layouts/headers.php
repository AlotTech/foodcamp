  <?php
use yii\helpers\Html;

/* @var $this \yii\web\View */
/* @var $content string */
?>
  <!-- Navigation -->
    <nav class="navbar navbar-inverse bg-light static-top">
      <div class="container">

    <?= Html::a(Html::img('@web/logo.png', ['width'=>'50','height'=>'30']).'Food Camp', Yii::$app->homeUrl, ['class' => 'logo']) ?> 

      <div class="pull-right">

    <?php  echo Html::a('<i class="fa fa-cart-arrow-down"></i> Kuliner', ['/detail/kuliner'], ['class' => 'btn btn-primary'])?>
 
 <?= Html::a('<i class="fa fa-fw fa-user"></i> Etnis', ['/detail/index'], ['class' => 'btn btn-succes']) ?>
     <?php echo  Yii::$app->user->identity->username; ?>
<?php if (Yii::$app->user->isGuest){ ?>

     
 <?= Html::a( '<i class="fa fa-fw  fa-sign-in"></i> Login', ['/login/index'], ['class' => 'btn btn-succes']) ?>
    
      <?php }else {?>

     <?= Html::a(
                                    'Sign out ',
                                    ['/site/logout'],
                                    ['data-method' => 'post', 'class' => 'btn btn-default btn-flat']
                                ) ?>

<?php      } ?>

      </div>
    </nav>