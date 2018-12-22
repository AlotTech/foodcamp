<?php

use backend\modules\mdata\models\Etnis;
use backend\modules\mdata\models\Kuliner;
use backend\modules\mdata\models\Provinsi;
use backend\modules\mdata\models\RatingKuliner;
use backend\modules\mdata\models\Store;
use kartik\grid\GridView;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\Pjax;
/**
 * @var yii\web\View $this
 * @var yii\data\ActiveDataProvider $dataProvider
 * @var backend\modules\mdata\models\KulinerSearch $searchModel
 */
$this->title = 'Dashboard';
?>

<div class="kuliner-index">
    <div class="page-header">
        <h1><!--?= Html::encode($this->title) ?--></h1>
    </div>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <p>
    <?php /* echo Html::a('Create Kuliner', ['create'], ['class' => 'btn btn-success'])*/?>
    </p>
    <?php Pjax::begin();
        echo GridView::widget([
            'dataProvider' => $dataProvider,
            //'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'kartik\grid\SerialColumn'],
                //'id',
                [
                    'attribute' => 'user_id',
                    'value' => function ($data) {
                        return $data = ucwords(Yii::$app->user->identity->username);
                    },
                ],
                'nama',
                [
                    'attribute' => 'etnis_id',
                    'value' => function ($data) {
                        return $data = Etnis::findOne($data->id)->nama;
                    },
                ],
                [
                    'attribute' => 'jenis_kuliner',
                    'value' => function ($data) {
                        if ($data->jenis_kuliner == 1) {
                            return 'Makanan';
                        } else if ($data->jenis_kuliner == 2) {
                            return 'Minuman';
                        } else if ($data->jenis_kuliner == 3) {
                            return 'Jajanan';
                        }
                    },
                ],
                [
                    'attribute' => 'st_halal',
                    'value' => function ($data) {
                        if ($data->st_halal == 1) {
                            return 'Halal';
                        } else if ($data->st_halal == 2) {
                            return 'Tidak Halal';
                        }
                    },
                ],
                //'detail',
                [
                    'attribute' => 'aktif',
                    'value' => function ($data) {
                        if ($data->aktif == 1) {
                            return 'Aktif';
                        } else if ($data->aktif == 2) {
                            return 'Tidak Aktif';
                        }
                    },
                ],
                [
                    'class' => 'kartik\grid\ActionColumn',
                    'template' => '{view}',
                ],
            ],
           'toolbar' => [
                '{export}',
                '{toggleData}'
            ],
            'hover' => true,
            'condensed' => true,
            'responsiveWrap' => false,
            'panel' => [
                'heading' => '<h3 class="panel-title"><i class="glyphicon glyphicon-th-list"></i> ' . Html::encode('Verfikasi Kuliner') . ' </h3>',
                'type' => 'primary',
                //'before' => Html::a('<i class="glyphicon glyphicon-plus"></i> Add', ['create'], ['class' => 'btn btn-success']),
                'before' => Html::a('<i class="glyphicon glyphicon-repeat"></i> Refresh', ['index'], ['class' => 'btn btn-success']),
                'footer' => false,
            ],
        ]);
    Pjax::end();?>
</div>




 <div class="page-header">
    <h1><!--?= Html::encode($this->title) ?--></h1>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title"><span class="glyphicon glyphicon-th"></span> Data</h3>
                </div>
                <div class="panel-body">
                    <div class="col-lg-3 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-green">
                            <div class="inner">
                                <h4><?php echo Provinsi::find()->count(); ?></h4><p> Provinsi</p>
                            </div>
                            <div class="icon">
                                <i class="fa fa-map-o"></i>
                            </div>
                            <a href="<?php echo Url::to(['mdata/provinsi/index']); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-aqua">
                            <div class="inner">
                                <h4><?php echo Etnis::find()->count(); ?></h4><p> Etnis</p>
                            </div>
                            <div class="icon">
                                <i class="fa fa-users"></i>
                            </div>
                            <a href="<?php echo Url::to(['mdata/etnis/index']); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-red">
                            <div class="inner">
                                <h4><?php echo Kuliner::find()->count(); ?></h4><p> Kuliner</p>
                            </div>
                            <div class="icon">
                                <i class="fa fa-cutlery"></i>
                            </div>
                            <a href="<?php echo Url::to(['mdata/kuliner/index']); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-yellow">
                            <div class="inner">
                                <h4><?php echo Store::find()->count(); ?></h4><p> Store</p>
                            </div>
                            <div class="icon">
                                <i class="fa fa-building-o"></i>
                            </div>
                            <a href="<?php echo Url::to(['mdata/store/index']); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-orange">
                            <div class="inner">
                                <h4><?php echo RatingKuliner::find()->count(); ?></h4><p> Rating</p>
                            </div>
                            <div class="icon">
                                <i class="fa fa-star"></i>
                            </div>
                            <a href="<?php echo Url::to(['mdata/rating-kuliner/index']); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                </div><!-- ./col -->
            </div>
        </div>
    </div>
</div>
