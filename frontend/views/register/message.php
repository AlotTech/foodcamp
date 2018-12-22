
<?php

use yii\helpers\Html;?>
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
                    <?php echo Html::a('<i class="fa fa-fw  fa-sign-in"></i> Sign In', ['/login/index']) ?>
                    <?php } else {?>
                    <?php echo Html::a('<i class="fa fa-fw  fa-sign-out"></i> Sign out ', ['/site/logout'], ['data-method' => 'post']) ?>
                    <?php }?>
                    </li>
                    <li>
                    <?php echo Html::a('<i class="fa fa-pencil-square-o"></i> Register ', ['/register/index']) ?>
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
                    <?php echo Html::a(Html::img('@web/logo.png', ['width' => '100', 'height' => '100']) . 'Food Camp', Yii::$app->homeUrl, ['class' => 'logo']) ?>
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
				<div class="row">
				    <div class="col-md-12">
				        <?php foreach (Yii::$app->session->getAllFlashes() as $type => $message): ?>
				            <?php if (in_array($type, ['success', 'danger', 'warning', 'info'])): ?>
				                <div class="alert alert-<?= $type ?>">
				                    <?= $message ?>
				                </div>
				            <?php endif ?>
				        <?php endforeach ?>
				    </div>
				</div>
			</div>
		</section>
	</section>

</div>