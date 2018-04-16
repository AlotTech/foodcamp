<?php
use yii\helpers\Html;

/* @var $this \yii\web\View */
/* @var $content string */
?>

<header class="main-header">

    <?= Html::a(Html::img('@web/logo.png', ['width'=>'100','height'=>'70']), Yii::$app->homeUrl, ['class' => 'logo']) ?>


    <nav class="navbar navbar-static-top" role="navigation">
<div class="pull-right" style="margin-top:2px;margin-right: 20px ">
    
        <?= Html::a(Yii::t('app', 'Login'), ['/user/login'], ['class' => 'btn btn-lg btn-danger']) ?>

&nbsp;
           <?= Html::a(Yii::t('app', 'Daftar'), ['/user/register'], ['class' => 'btn btn-lg btn-default']) ?>
   
&nbsp;
</div>

        <div class="navbar-custom-menu">
       
 <?php if (!Yii::$app->user->isGuest){ ?>
            <ul class="nav navbar-nav">

                
               
                <!-- User Account: style can be found in dropdown.less -->

                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="<?php echo Yii::getAlias('@web/logo.png') ?>" class="user-image" alt="User Image"/>
                        <span class="hidden-xs">Alot</span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header">
                            <img src="<?php echo Yii::getAlias('@web/logo.png') ?>" class="img-circle"
                                 alt="User Image"/>

                            <p>
                                A LOT 
                                <small>Member since Nov. 2012</small>
                            </p>
                        </li>
                      
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="pull-left">
                                <a href="#" class="btn btn-default btn-flat">Profile</a>
                            </div>
                            <div class="pull-right">
                                <?= Html::a(
                                    'Sign out',
                                    ['/site/logout'],
                                    ['data-method' => 'post', 'class' => 'btn btn-default btn-flat']
                                ) ?>
                            </div>
                        </li>
                    </ul>
                </li>

                <!-- User Account: style can be found in dropdown.less -->
                
            </ul>
        </div>

        <?php }?>
    </nav>
</header>
