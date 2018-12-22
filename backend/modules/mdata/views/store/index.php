<?php

use kartik\grid\GridView;
use yii\helpers\Html;
use yii\widgets\Pjax;

/**
 * @var yii\web\View $this
 * @var yii\data\ActiveDataProvider $dataProvider
 * @var backend\modules\mdata\models\StoreSearch $searchModel
 */

$this->title = 'Store';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="store-index">
    <div class="page-header">
        <h1><!--?= Html::encode($this->title) ?--></h1>
    </div>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <p>
    <?php /* echo Html::a('Create Store', ['create'], ['class' => 'btn btn-success'])*/?>
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
                'alamat',
                'telepon',
                //'hari',
                //'foto',
                //'lokasi',
                //'harga',
                [
                    'class' => 'kartik\grid\ActionColumn',
                    'buttons' => [
                        'update' => function ($url, $model) {
                            return Html::a('<span class="glyphicon glyphicon-pencil"></span>',
                                Yii::$app->urlManager->createUrl(['mdata/store/view', 'id' => $model->id, 'edit' => 't']),
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
                //'footer' => false,
            ],
        ]);
    Pjax::end();?>
</div>
