<?php

use backend\modules\mdata\models\Kuliner;
use backend\modules\mdata\models\Provinsi;
use backend\modules\mdata\models\VwFcamp;
use kartik\widgets\Typeahead;
use yii\bootstrap\ActiveForm;

use backend\modules\mdata\models\DetailKuliner;
use yii\helpers\Html;
use yii\widgets\LinkPager;
$model = new Provinsi;

?>
<div class="page sub-page">
    <header class="hero">
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
                <div class="container">
                    <h1 class="opacity-40 center">
                         Find What You Need
                    </h1>
                </div>
                <!--end container-->
            </div>
            <!--============ End Page Title =====================================================================-->
            <?php
                $form = ActiveForm::begin([
                    'action' => ['list'],
                    'method' => 'get',
                ]);

                $values = Provinsi::find()->select('nama')->all();
                foreach ($data as $key => $value) {
                    $values[] = $value['nama'];
                } ?>

                <?php
                    $values = [];
                    $data = VwFcamp::find()->all();
                    //  $data = Provinsi::find()->select('nama')->all();
                    foreach ($data as $key => $value) {
                        $values[] = $value['kuliner'];
                        $values[] = $value['provinsi'];
                        $values[] = $value['etnis'];
                    };
                ?>
            ?>
            <!--============ Hero Form ==========================================================================-->
            <div class="hero-form form">
                <div class="container">
                    <!--Main Form-->
                    <div class="main-search-form">
                        <div class="form-row">
                            <div class="col-md-9 col-sm-9">
                                <div class="form-group">
                                    <label for="what" class="col-form-label">What Are You Looking For?</label>
                                    <?php
                                        echo $form->field($model, 'nama')->label(false)->widget(Typeahead::classname(), [
                                            'options' => ['placeholder' => 'Search by Food, Etnis, Place'],
                                            'pluginOptions' => ['highlight' => true, 'class' => 'form-control'],
                                            'scrollable' => true,
                                            //'rtl' => true,
                                            'dataset' => [
                                                [
                                                    'local' => $values,
                                                    'limit' => 10,

                                                ],
                                            ],
                                        ]);
                                    ?>
                                </div>
                                <!--end form-group-->
                            </div>
                            <!--end col-md-3-->
                            <div class="col-md-3 col-sm-3">
                            <?php echo Html::submitButton('Search', ['class' => 'btn btn-primary width-100'])?>
                            </div>
                            <!--end col-md-3-->
                        </div>
                        <!--end form-row-->
                    </div>
                    <!--end main-search-form-->
                    <?php ActiveForm::end();?>
                </div>
                <!--end container-->
            </div>
            <!--============ End Hero Form ======================================================================-->
            <div class="background">
                <div class="background-image">
                    <?php echo Html::img('@web/hero-bg2.jpg');?>
                </div>
            </div>
            <!--end background-->
        </div>
        <!--end hero-wrapper-->
    </header>
    <section class="content">
        <section class="block">
            <div class="container">
                <!--============ Section Title===================================================================-->
                <div class="section-title clearfix">
                    <div class="float-right d-xs-none thumbnail-toggle">
                        <a href="#" class="change-class active" data-change-from-class="list" data-change-to-class="grid" data-parent-class="items">
                            <i class="fa fa-th"></i>
                        </a>
                        <a href="#" class="change-class" data-change-from-class="grid" data-change-to-class="list" data-parent-class="items">
                            <i class="fa fa-th-list"></i>
                        </a>
                    </div>
                </div>
                <!--============ Items ==========================================================================-->
                <div class="items grid grid-xl-4-items grid-lg-3-items grid-md-2-items">
                <?php
                    $daerah = $_GET['Provinsi']['nama'];
                    $halal = $_GET["hl"];
                    $jenis = $_GET["jk"];
                    $offset = $pagination->offset;
                    $limit = $pagination->limit;
                    $countries = VwFcamp::listKuliner($daerah, $halal, $jenis, $limit, $offset);
                    foreach ($countries->each() as $country): ?>
                    <div class="item">
                        <!--end ribbon-->
                        <div class="wrapper">
                            <div class="image">
                                <h3>
                                    <a href="" class="tag category"><?php echo $country['etnis']?></a>
                                    <a href="" class="title"> <?php echo $country['kuliner']?></a>
                                    <span class="tag">Offer</span>
                                </h3>
                                <a href="" class="image-wrapper background-image">
                                   

        <?php  $dtkuliner = DetailKuliner::find()->where(['kuliner_id' => $country['kulinerid']])->one();?>
          <img src="<?php echo '/foodcamp/'.Yii::$app->urlManagerBackend->baseUrl.'/kuliner/'.$dtkuliner->foto?>" />
                                </a>
                            </div>
                            <!--end image-->
                            <h4 class="location">
                                <a href=""><?php echo $country['provinsi']?>,</a>
                            </h4>
                            <div class="description">
                                <p>
                                <?php echo substr(Kuliner::findOne($country['kulinerid'])->detail, 25); ?>
                                </p>
                            </div>
                            <!--end description-->
                            <?php echo Html::a('Detail', ['detail', 'id' => $country['kulinerid']], ['class' => 'detail text-caps underline']) ?>
                        </div>
                    </div>
                    <!--end item-->
                    <?php endforeach; ?>
                </div>
                <!--============ End Items ======================================================================-->
                <div class="page-pagination">
                    <nav aria-label="Pagination">
                        <ul class="pagination">
                        <?php echo LinkPager::widget(['pagination' => $pagination])?>
                        </ul>
                    </nav>
                </div>
                <!--end page-pagination-->
            </div>
            <!--end container-->
        </section>
        <!--end block-->
    </section>
    <!--end content-->
</div>
