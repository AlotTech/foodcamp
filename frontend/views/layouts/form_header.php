<?php

use yii\helpers\Html;

/* @var $this \yii\web\View */
/* @var $content string */

?>

<header class="hero">
    <div class="hero-wrapper">
        <div class="secondary-navigation">
            <div class="container">
                <ul class="left">
                    <li>
                    <span>
                        <i class="fa fa-phone"></i> contact@alot.com
                    </span>
                    </li>
                </ul>
                <!--end left-->
                <ul class="right">
                    <li>
                         <?php if (Yii::$app->user->isGuest) { ?>
                        <?php echo Html::a('<i class="fa fa-fw  fa-sign-in"></i> Sign In', ['/login/index'])?>
                        <?php echo Html::a('<i class="fa fa-pencil-square-o"></i> Register ', ['/register/index'])?>
                        <?php } else { ?>
                        <?php echo Html::a('<i class="fa fa-fw  fa-sign-out"></i> Sign out ', ['/site/logout'], ['data-method' => 'post']) ?>
                        <?php } ?>
                    <li>
                </ul>
                <!--end right-->
            </div>
            <!--end container-->
        </div>
        <div class="main-navigation">
            <div class="container">
                <nav class="navbar navbar-expand-lg navbar-light justify-content-between">
                    <a class="navbar-brand" href="index.html">
                    <?php echo Html::a(Html::img('@web/logo.png', ['width' => '100', 'height' => '100']) . 'Food Camp', Yii::$app->homeUrl, ['class' => 'logo'])?>
                    </a> 
                    <div class="navbar-expand" id="navbar">
                        <!--Main navigation list-->
                
                            <ul class="navbar-nav">
                                <li class="nav-item ">
                                    <a class="nav-link" href="#">Home
                                    </a>
                                </li>
                              
                                <?php if (!Yii::$app->user->isGuest) { ?>
                                     
                                       <li class="nav-item">
                                        <?php echo Html::a('Profile', ['/profile/index'], ['class' => 'nav-link']); ?>
                                          </li>

                                       <li class="nav-item">
                                <?php echo Html::a('Tambah Kuliner', ['/site/add-kuliner'], ['class' => 'nav-link']); ?>
                            </li>
                                <?php // echo Html::a('Tambah Toko', ['/site/add-store'], ['class' => 'btn btn-primary text-caps btn-rounded btn-framed']); ?>
                                <?php } ?>
                              
                        </ul>
                        <!--Main navigation list-->
                    </div>
                    <!--end navbar-collapse-->
                </nav>
                <!--end navbar-->
            </div>
            <!--end container-->
        </div>
    </div>
</header>