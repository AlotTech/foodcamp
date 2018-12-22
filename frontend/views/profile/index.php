<?php

use backend\modules\mdata\models\Etnis;
use dektrium\user\models\User;
use kartik\grid\GridView;
use yii\helpers\Html;
use yii\widgets\Pjax;

/**
 * @var yii\web\View $this
 * @var yii\data\ActiveDataProvider $dataProvider
 * @var backend\modules\mdata\models\KulinerSearch $searchModel
 */

$this->title = 'Kontribusi Kuliner';
$this->params['breadcrumbs'][] = $this->title;
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
                //['class' => 'kartik\grid\SerialColumn'],
                
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
                        return $data = Etnis::findOne($data->etnis_id)->nama;
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
              
              
            ],
            'hover' => true,
            'condensed' => true,
            'responsiveWrap' => false,
            'panel' => [
                'heading' => '<h3 class="panel-title"><i class="glyphicon glyphicon-th-list"></i> ' . Html::encode($this->title) . ' </h3>',
                'type' => 'info',
                
                'after' => Html::a('<i class="glyphicon glyphicon-repeat"></i> Reset List', ['index'], ['class' => 'btn btn-info']),
                //'footer' => 'false',
            ],
        ]);
    Pjax::end();?>
</div>


 <?php Pjax::begin();
        echo GridView::widget([
            'dataProvider' => $models,
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
                'alamat',
                //'telepon',
                //'hari',
                //'foto',
                //'lokasi',
                //'harga',
                
               
            ],
            'hover' => true,
            'condensed' => true,
            'responsiveWrap' => false,
            'panel' => [
                'heading' => '<h3 class="panel-title"><i class="glyphicon glyphicon-th-list"></i> ' . Html::encode('Kontribusi Toko') . ' </h3>',
                'type' => 'primary',
                //'before' => Html::a('<i class="glyphicon glyphicon-plus"></i> Add', ['create'], ['class' => 'btn btn-success']),
                'before' => Html::a('<i class="glyphicon glyphicon-repeat"></i> Refresh', ['index'], ['class' => 'btn btn-success']),
                'footer' => false,
            ],
        ]);
    Pjax::end();?>