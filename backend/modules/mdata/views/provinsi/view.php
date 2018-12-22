<?php

use kartik\detail\DetailView;

/**
 * @var yii\web\View $this
 * @var backend\modules\mdata\models\Provinsi $model
 */

$this->title = 'View / Update Provinsi: ' . ' ' . $model->nama;
$this->params['breadcrumbs'][] = ['label' => 'Provinsi', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-8 col-md-offset-2 provinsi-view">
            <div class="page-header">
                <h1><!--?= Html::encode($this->title) ?--></h1>
            </div>
            <?php echo DetailView::widget([
                'model' => $model,
                'condensed' => false,
                'hover' => true,
                'mode' => Yii::$app->request->get('edit') == 't' ? DetailView::MODE_EDIT : DetailView::MODE_VIEW,
                'panel' => [
                    'heading' => '<span class="glyphicon glyphicon-pencil"></span> '.$this->title,
                    'type' => DetailView::TYPE_INFO,
                ],
                'attributes' => [
                    //'id',
                    'nama',
                    'kode',
                    [
                        'attribute' => 'foto',
                        'type' => DetailView::INPUT_WIDGET,
                        'widgetOptions' => [
                            'class' => DetailView::INPUT_FILEINPUT,
                            'options' => ['accept' => 'image/*'],
                            'pluginOptions' => [
                                'showUpload' => false,
                            ],
                        ],
                        'value' => '@web/uploads/provinsi/' . $model->foto,
                        'format' => ['image', ['width' => '300', 'height' => '300']],
                    ],
                ],
                'deleteOptions' => [
                    'url' => ['delete', 'id' => $model->id],
                ],
                'enableEditMode' => true,
            ]); ?>
        </div>
    </div>
</div>