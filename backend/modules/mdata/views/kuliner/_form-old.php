<?php

use backend\modules\mdata\models\Etnis;
use dektrium\user\models\User;
use kartik\builder\Form;
use kartik\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var backend\modules\mdata\models\Kuliner $model
 * @var yii\widgets\ActiveForm $form
 */
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title"><span class="glyphicon glyphicon-pencil"></span> Form Data Kuliner</h3>
                </div>
                <div class="panel-body">
                    <div class="kuliner-form">
                    <?php $form = ActiveForm::begin(['type' => ActiveForm::TYPE_HORIZONTAL]);
                        echo Form::widget([
                            'model' => $model,
                            'form' => $form,
                            'columns' => 1,
                            'attributes' => [
                                'user_id' => [
                                    'type' => Form::INPUT_TEXT,
                                    'options' => [
                                        'placeholder' => 'User ID',
                                        'value' => ucwords(Yii::$app->user->identity->username),
                                        'readonly' => true,
                                    ]
                                ],
                                'nama' => ['type' => Form::INPUT_TEXT, 'options' => ['placeholder' => 'Nama', 'maxlength' => 45]],
                                'jenis_kuliner' => ['type' => Form::INPUT_TEXT, 'options' => ['placeholder' => 'Jenis Kuliner', 'maxlength' => 1]],
                                'etnis_id' => [
                                    'type' => Form::INPUT_WIDGET,
                                    'widgetClass' => '\kartik\widgets\Select2',
                                    'options' => [
                                        'data' => ArrayHelper::map(Etnis::find()->all(), 'id', 'nama'),
                                        'options' => ['placeholder' => 'Etnis'],
                                        'pluginOptions' => [
                                            'allowClear' => true,
                                        ],
                                    ],
                                ],
                                'st_halal' => [
                                    'type' => Form::INPUT_RADIO_LIST,
                                    'items' => [0 => 'Halal', 1 => 'Tidak Halal'], 
                                    'options'=> ['inline' => true]
                                ],
                                'detail' => [
                                    'type' => Form::INPUT_TEXTAREA,
                                    'options' => [
                                        'placeholder' => 'Detail',
                                        'rows' => 5
                                    ],
                                ],   
                                'aktif' => [
                                    'type' => Form::INPUT_RADIO_LIST,
                                    'items' => [0 => 'Aktif', 1 => 'Tidak Aktif'], 
                                    'options'=> ['inline' => true]
                                ],
                                //'rating' => ['type' => Form::INPUT_TEXT, 'options' => ['placeholder' => 'Rating']],
                            ],
                        ]);
                    ?>
                    </div>
                </div>
                <div class="panel-footer">
                <?php echo Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success btn-block' : 'btn btn-primary btn-block']); ?>
                </div>
                <?php ActiveForm::end();?>
            </div>
        </div>
    </div>
</div>
