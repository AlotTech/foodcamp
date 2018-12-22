<?php

use yii\helpers\Html;

/* @var $this \yii\web\View */
/* @var $content string */

?>

<footer class="footer">
    <div class="wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-5">
                    <a href="#" class="brand">
                    <?php echo Html::a(Html::img('@web/logo.png', ['width' => '100', 'height' => '100']) . 'Food Camp', Yii::$app->homeUrl, ['class' => 'logo'])?>
                    </a>
                    <p>
                      
                    </p>
                </div>
                <!--end col-md-5-->
                <div class="col-md-2">
                    <h2>Temukan</h2>
                    <div class="row">
                        <div class="col-md-8 col-sm-8   ">
                            <nav>
                                <ul class="list-unstyled">
                                    <li>
                                        <a href="#">Mobile Apps</a>
                                    </li>
                                    <li>
                                        <a href="#">Tulis Ulasan</a>
                                    </li>
                                    <li>
                                        <a href="#">Buat Koleksi</a>
                                    </li>
                                    <li>
                                        <a href="#">Hadiah</a>
                                    </li>
                                    <li>
                                        <a href="#">Privasi</a>
                                    </li>
                                    <li>
                                        <a href="#">Syarat dan Ketentuan</a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
                <!--end col-md-3-->
                <div class="col-md-2">
                    <h2>Perusahaan</h2>
                    <div class="row">
                        <div class="col-md-8 col-sm-8">        
                            <nav>
                                <ul class="list-unstyled">
                                    <li>
                                        <a href="#">Tentang Kami</a>
                                    </li>
                                    <li>
                                        <a href="#">Bantuan</a>
                                    </li>
                                    <li>
                                        <a href="#">Saran</a>
                                    </li>
                                    <li>
                                        <a href="#">Pengerahan</a>
                                    </li>
                                    <li>
                                        <a href="#">Kontak</a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
                <!--end col-md-3-->
                <div class="col-md-3">
                    <h2>Temukan kami di</h2>
                    <div class="row">
                        <div class="col-md-8 col-sm-8">        
                            <nav>
                                <ul class="list-unstyled">
                                    <li>
                                        <a href="#">Facebook</a>
                                    </li>
                                    <li>
                                        <a href="#">Instagram</a>
                                    </li>
                                    <li>
                                        <a href="#">Twitter</a>
                                    </li>
                                    <li>
                                        <a href="#">Youtube</a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
                <!--end col-md-4-->
            </div>
            <!--end row-->
        </div>
        <div class="background">
            <div class="background-image original-size">
                <img src="assets/img/footer-background-icons.jpg" alt="">
            </div>
            <!--end background-image-->
        </div>
        <!--end background-->
    </div>
</footer>>