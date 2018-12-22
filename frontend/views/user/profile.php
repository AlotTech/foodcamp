<?php

use kartik\detail\DetailView;
use kartik\datecontrol\DateControl;
use yii\widgets\Pjax;
use yii\bootstrap\Modal;

use yii\bootstrap\Nav;



use yii\helpers\Html;
/**
 * @var yii\web\View $this
 * @var backend\modules\sdm\models\Agama $model
 */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Agamas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="agama-view">
    <div class="page-header">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>


    <?= DetailView::widget([
            'model' => $model,
            'condensed'=>false,
            'hover'=>true,
            'mode'=>Yii::$app->request->get('edit')=='t' ? DetailView::MODE_EDIT : DetailView::MODE_VIEW,
            'panel'=>[
            'heading'=>$this->title,
            'type'=>DetailView::TYPE_INFO,
        ],
        'attributes' => [
          //  'id',
            [
            'label'=>'Name',
            'value'=>$model->pegawai->nama,
            ],
                        'username',
           'email', 

           'password_hash',
           
                 [
                 'label'=>'Foto',
                 'format'=>'raw',
                 'value'=>Html::img(Yii::getAlias('@web').'/uploads/'.$model->foto),
           ]
        ],
        'deleteOptions'=>[
            'url'=>['delete', 'id' => $model->id],
            'data'=>[
                'confirm'=>Yii::t('app', 'Are you sure you want to delete this item?'),
                'method'=>'post',
            ],
        ],
        'enableEditMode'=>false,
    ]) ?>

</div>
<?=
Html::a('<i class="glyphicon glyphicon-plus"></i> Update Profile','#', [
                    'class' => 'link btn btn-success',
                    'title' => Yii::t('yii', 'Create'),
                    'data-toggle' => 'modal',
                    'data-target' => '#matauang-cr',
                    'data-id' => '0',
                    'data-pjax' => '0',
                    //'params'=>['create'=>true]

                ]);

                ?> &nbsp;
<?=
Html::a('<i class="glyphicon glyphicon-plus"></i> Update Foto','#', [
                    'class' => 'link btn btn-success',
                    'title' => Yii::t('yii', 'Create'),
                    'data-toggle' => 'modal',
                    'data-target' => '#profile-up',
                    'data-id' => '0',
                    'data-pjax' => '0',
                    //'params'=>['create'=>true]

                ]);

                ?>

<?php Modal::begin([
'id' => 'profile-up',
'header' => '<h4 class="modal-title">Ubah Profile</h4>',
'size'=>'modal-lg',
'footer' => '<a href="#" class="btn btn-primary" data-dismiss="modal">Close</a>',
]);
echo $this->render('_formFoto', [
        'model' => $model,
    ]);

Modal::end(); ?>

<?php Modal::begin([
'id' => 'matauang-cr',
'header' => '<h4 class="modal-title">Ubah Profile</h4>',
'size'=>'modal-lg',
'footer' => '<a href="#" class="btn btn-primary" data-dismiss="modal">Close</a>',
]);
echo $this->render('_form', [
        'model' => $model,
    ]);

Modal::end(); ?>