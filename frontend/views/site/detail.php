<?php
use yii\helpers\Url;

use backend\modules\mdata\models\Kuliner;
use backend\modules\mdata\models\VwFcamp;
use yii\helpers\Html;
use yii\widgets\LinkPager;
use kartik\dropdown\DropdownX;
use yii\bootstrap\Dropdown;

use backend\modules\mdata\models\DetailKuliner;


use backend\modules\mdata\models\Store;

use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;

  use kartik\widgets\Typeahead;

?>
    <div class="page sub-page">
         <section class="hero">
            <div class="hero-wrapper">
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
                            <?php if (Yii::$app->user->isGuest) { ?>
                            <?php echo Html::a('<i class="fa fa-fw  fa-sign-in"></i> Sign In', ['/login/index'])?>
                            <?php echo Html::a('<i class="fa fa-pencil-square-o"></i> Register ', ['/register/index'])?>
                            <?php } else { ?>
                            <?php echo Html::a('<i class="fa fa-fw  fa-sign-out"></i> Sign out ', ['/site/logout'], ['data-method' => 'post']) ?>
                            <?php } ?>
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
                                 <?= Html::a(Html::img('@web/logo.png', ['width'=>'100','height'=>'100']).'Food Camp', Yii::$app->homeUrl, ['class' => 'logo']) ?> 
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
                                <?php if (!Yii::$app->user->isGuest) { ?>
                                <?php echo Html::a('Add Kuliner', ['/site/add-kuliner'], ['class' => 'btn btn-primary text-caps btn-rounded btn-framed']); ?>
                                <?php echo Html::a('Add Store', ['/site/add-store'], ['class' => 'btn btn-primary text-caps btn-rounded btn-framed']); ?>
                                <?php } ?>
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
                   <div class="page-title">
                    <div class="container clearfix">
                        <div class="float-left float-xs-none">
                            <h1><?php echo $model->nama?>
                            </h1>
                            <h4 class="location">
                                <a href="#"><?php echo $model->etnis->provinsi->nama.", ".$model->etnis->nama?></a>
                            </h4>
                        </div>
                    
                    </div>
                    <!--end container-->
                </div>
                  <div class="background"></div>
                <!--end background-->
            </div>
            <!--end hero-wrapper-->
        </section>

   <section class="content">
            <section class="block">
                <div class="container">
                <div class="row flex-column-reverse flex-md-row">
                        <div class="col-md-12">
                              <section class="my-0">
                                <div class="author big">
                                    <div class="author-image">
                                        <div class="background-image">
                                                 <img src="<?php echo '/foodcamp/'.Yii::$app->urlManagerBackend->baseUrl.'/kuliner/'.$dtkuliner->foto?>" />
                                        </div>
                                    </div>
                                    <!--end author-image-->
                                    <div class="author-description">
                                        <div class="section-title">
                                            <h2><?= $model->nama?></h2>
                                            <h4 class="location">
                                                <a href="#"><?= $model->etnis->provinsi->nama?>, <?= $model->etnis->nama?></a>
                                            </h4>
                                            <figure>
                                                <div class="text-align-right social">
                                                    <a href="#">
                                                        <i class="fa fa-facebook-square"></i>
                                                    </a>
                                                    <a href="#">
                                                        <i class="fa fa-twitter-square"></i>
                                                    </a>
                                                    <a href="#">
                                                        <i class="fa fa-instagram"></i>
                                                    </a>
                                                </div>
                                            </figure>
                                        </div>
                                        <div class="additional-info">
                                            <ul>
                                                <li>
                                                    <figure>Status Halal</figure>
                                                    <aside><?php if ($model->st_halal == 1) {
                                        echo "Halal";
                                    }else{echo "tidak halal";}?></aside>
                                                </li>
                                                <li>
                                                    <figure>Kategori</figure>
                                                    <aside><a href="#"><?php if ($model->jenis_kuliner == 1) {
                                        echo "Makanan";
                                    }else{echo "Minuman";}?></a></aside>
                                                </li>
                                            </ul>
                                        </div>
                                        <!--end addition-info-->
                                        <p>
                                            <h3>Detail </h3>
                                           <?php 
                                        echo $model->detail;
                                  ?>
                                        </p>

                                               <div class="alternative-search-form">
                                <a href="#collapseAlternativeSearchForm" class="icon" data-toggle="collapse"  aria-expanded="false" aria-controls="collapseAlternativeSearchForm"><i class="fa fa-plus"></i>Resep</a>
                                <div class="collapse" id="collapseAlternativeSearchForm">
                                    <div class="wrapper">
                                        <div class="form-row">
                                         
                                                 <?php echo $dtkuliner->resep;?>
                                           
                                        </div>
                                        <!--end row-->
                                    </div>
                                    <!--end wrapper-->
                                </div>
                                <!--end collapse-->
                            </div>
                                    </div>
                                    <!--end author-description-->
                                </div>
                                <!--end author-->
                            </section>

                            <hr>
                       </div>
                              <section>
                                <h2>Store</h2>
                                <!--============ Section Title===================================================================-->
                             
                                <!--============ Items ==========================================================================-->
                                <div class="read-more" data-read-more-link-more="Show More" data-read-more-link-less="Show Less">
                                    <div class="items grid grid-xl-3-items grid-lg-3-items grid-md-2-items">
                    <?php foreach ($store as  $stores): ?>
                        <?php $kuliner =  Kuliner::findOne($stores['kuliner_id']);?>
                        <?php $place =  Store::findOne($stores['store_id']);?>
                                        <div class="item">
                                            <!--end ribbon-->
                                            <div class="wrapper">
                                                <div class="image">
                                                    <h3>
                                                        <a href="#" class="tag category"><?= $kuliner->nama?></a>
                                                        <a href="#" class="title"><?= $place->nama?></a>
                                                       
                                                    </h3>
                                                    <a href="single-listing-1.html" class="image-wrapper background-image">
                                                        <img src="assets/img/image-01.jpg" alt="">
                                                    </a>
                                                </div>
                                                <!--end image-->
                                                <h4 class="location">
                                                    <a href="#"><?= $kuliner->etnis->provinsi->nama?></a>
                                                </h4>
                                                <div class="meta">
                                                    <figure>
                                                        <i class="fa fa-phone"></i><?= $place->telepon?>
                                                    </figure>
                                                    <figure>
                                                        <a href="#">
                                                          
                                                        </a>
                                                    </figure>
                                                </div>
                                                <!--end meta-->
                                                <div class="description">
                                                <p>   Alamat : <?= $place->alamat?></p>
                                                </div>
                                                <!--end description-->
                                                <a href="single-listing-1.html" class="detail text-caps underline">Detail</a>
                                            </div>
                                        </div>
                                        <!--end item-->
                             <?php endforeach;?>
                                    </div>
                                    <!--============ End Items ==============================================================-->
                                </div>
                                <!--end read-more-->
                            </section>
                </div>     
                    
            </section>
            <!--end block-->
        </section>
        <!--end content-->

    </div>
              
                <!--============ End Page Title =====================================================================-->