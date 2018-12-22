  <?php
use yii\helpers\Html;

/* @var $this \yii\web\View */
/* @var $content string */
?>

<div class="page home-page">
        <!--*********************************************************************************************************-->
        <!--************ HERO ***************************************************************************************-->
        <!--*********************************************************************************************************-->
<header class="hero">
        <div class="hero-wrapper">
            <div class="secondary-navigation">
                    <div class="container">
                        <ul class="left">
                            <li>
                            <span>
                                <i class="fa fa-phone"></i> +1 123 456 789
                            </span>
                            </li>
                        </ul>
                        <!--end left-->
                        <ul class="right">
                          
                            <li>
                                <?php if (Yii::$app->user->isGuest){ ?>
 <?= Html::a( '<i class="fa fa-fw  fa-sign-in"></i> Sign In', ['/login/index']) ?>
                             <?php }else {?>
                              <?= Html::a('<i class="fa fa-fw  fa-sign-out"></i> Sign out ',['/site/logout'],['data-method' => 'post']
                                ) ?>
                             <?php }?>
                            </li>
                            <li>
                               
                                <?= Html::a( '<i class="fa fa-pencil-square-o"></i> Register ', ['/register/index']) ?>
                            </li>
                        </ul>
                        <!--end right-->
                    </div>
                    <!--end container-->
                </div>


                    <div class="main-navigation">
                    <div class="container">
                        <nav class="navbar navbar-expand-lg navbar-light justify-content-between">
                            <a class="navbar-brand" href="index.html">
                                 <?= Html::a(Html::img('@web/logo.png', ['width'=>'150','height'=>'70']).'Food Camp', Yii::$app->homeUrl, ['class' => 'logo']) ?> 
                              </a>
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                            <div class="collapse navbar-collapse" id="navbar">
                                <!--Main navigation list-->
                                <ul class="navbar-nav">
                                    <li class="nav-item ">
                                        <a class="nav-link" href="#">Home</a>
                                      
                                    </li>
                                    
                                    <li class="nav-item">
                                        <a class="nav-link" href="contact.html">Contact</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="submit.html" class="btn btn-primary text-caps btn-rounded btn-framed">Submit Ad</a>
                                    </li>
                                </ul>
                                <!--Main navigation list-->
                            </div>
                            <!--end navbar-collapse-->
                        </nav>
                        <!--end navbar-->
                    </div>
                    <!--end container-->
                </div>
<!--
 <div class="background">
                    <div class="background-image original-size">
                       
                                 <?= Html::img('@web/hero-bg.jpg'); ?> 
                    </div>
                    <!--end background-image
                </div> -->
        </div>

    </header>

</div>