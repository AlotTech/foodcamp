<?php

/*
 * This file is part of the Dektrium project.
 *
 * (c) Dektrium project <http://github.com/dektrium>
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

use yii\bootstrap\ActiveForm;
use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var dektrium\user\models\User $model
 * @var dektrium\user\Module $module
 */
?>
     
<?php $form = ActiveForm::begin([
    'id' => 'login-form',
    'enableAjaxValidation' => true,
    'enableClientValidation' => false,
    'validateOnBlur' => false,
    'validateOnType' => false,
    'validateOnChange' => false,
]); ?>

<div class="page sub-page">
    <section class="hero">
        <div class="secondary-navigation">
            <div class="container">
                <ul class="left">
                    <li>
                    <span>
                         <i class="fa fa-envelope"></i> contact@alot.com
                    </span>
                    </li>
                </ul>
                <!--end left-->
                <ul class="right">
                    <li>
                    <?php if (Yii::$app->user->isGuest) {?>
                    <?php echo Html::a('<i class="fa fa-fw  fa-sign-in"></i> Sign In', ['/login/index'])?>
                    <?php } else { ?>
                    <?php echo Html::a('<i class="fa fa-fw  fa-sign-out"></i> Sign out ', ['/site/logout'], ['data-method' => 'post']) ?>
                    <?php } ?>
                    </li>
                    <li>
                    <?php echo Html::a('<i class="fa fa-pencil-square-o"></i> Register ', ['/register/index'])?>
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
                    <?php echo Html::a(Html::img('@web/logo.png', ['width' => '100', 'height' => '100']) . 'Food Camp', Yii::$app->homeUrl, ['class' => 'logo'])?>
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
                        </ul>
                        <!--Main navigation list-->
                    </div>
                    <!--end navbar-collapse-->
                </nav>
                <!--end navbar-->
            </div>
            <!--end container-->
        </div>
        <!--end hero-wrapper-->
    </section>
    <section class="content">
        <section class="block">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-4 col-lg-5 col-md-6 col-sm-8">
                        <form class="form clearfix">
                            <div class="form-group">
                            <?php echo $form->field($model, 'login', ['inputOptions' => ['autofocus' => 'autofocus', 'class' => 'form-control', 'tabindex' => '1']])->label("Username"); ?>
                            </div>
                            <!--end form-group-->
                            <div class="form-group">
                            <?php echo $form->field($model, 'password', [
                                'inputOptions' => [
                                    'class' => 'form-control', 
                                    'tabindex' => '2'
                                ]
                            ])->passwordInput()->label(Yii::t('user', 'Password'). ($module->enablePasswordRecovery ? '(' . Html::a( Yii::t('user', 'Forgot password?'), ['/user/recovery/request'], ['tabindex' => '5']) . ')' : '')); ?>
                            </div>
                            <!--end form-group-->
                            <div class="d-flex justify-content-between align-items-baseline">
                            <?php echo Html::submitButton(Yii::t('user', 'Login'), ['class' => 'btn btn-primary  btn-block', 'tabindex' => '4']); ?>
                            </div>
                        </form>
                        <hr>
                        <p>
                            By clicking "Register" button, you agree with our <a href="#" class="link">Terms & Conditions.</a>
                        </p>
                    </div>
                    <!--end col-md-6-->
                </div>
                <!--end row-->
            </div>
            <!--end container-->
        </section>
        <!--end block-->
    </section>
</div>
<?php ActiveForm::end();?>
