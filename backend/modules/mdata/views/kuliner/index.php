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

$this->title = 'Kuliner';
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
                [
                    'class' => 'kartik\grid\ExpandRowColumn',
                    'value' => function ($model, $key, $index, $column) {
                        return GridView::ROW_COLLAPSED;
                    },
                    'detail' => function ($model) {
                        return Yii::$app->controller->renderPartial('_rows-expand', ['model' => $model]);
                    },
                    'detailRowCssClass' => GridView::TYPE_DEFAULT,
                ],
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
                    'buttons' => [
                        'update' => function ($url, $model) {
                            return Html::a('<span class="glyphicon glyphicon-pencil"></span>',
                                Yii::$app->urlManager->createUrl(['mdata/kuliner/update', 'id' => $model->id]),
                                ['title' => Yii::t('yii', 'Edit')]
                            );
                        },
                    ],
                ],
            ],
            'hover' => true,
            'condensed' => true,
            'responsiveWrap' => false,
            'panel' => [
                'heading' => '<h3 class="panel-title"><i class="glyphicon glyphicon-th-list"></i> ' . Html::encode($this->title) . ' </h3>',
                'type' => 'info',
                'before' => Html::a('<i class="glyphicon glyphicon-plus"></i> Add', ['create'], ['class' => 'btn btn-success']),
                'after' => Html::a('<i class="glyphicon glyphicon-repeat"></i> Reset List', ['index'], ['class' => 'btn btn-info']),
                //'footer' => 'false',
            ],
        ]);
    Pjax::end();?>
</div>
