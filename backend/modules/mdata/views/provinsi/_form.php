<?php

use kartik\builder\Form;
use kartik\widgets\ActiveForm;
use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var backend\modules\mdata\models\Provinsi $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title"><span class="glyphicon glyphicon-pencil"></span> Form Data Provinsi</h3>
                </div>
                <div class="panel-body">
                    <div class="provinsi-form">
                    <?php $form = ActiveForm::begin(['type' => ActiveForm::TYPE_HORIZONTAL]);
                        echo Form::widget([
                            'model' => $model,
                            'form' => $form,
                            'columns' => 1,
                            'attributes' => [
                                'nama' => ['type' => Form::INPUT_TEXT, 'options' => ['placeholder' => 'Nama Provinsi', 'maxlength' => 45]],
                                'kode' => ['type' => Form::INPUT_TEXT, 'options' => ['placeholder' => 'Kode Provinsi', 'maxlength' => 45]],
                                'foto' => [
                                    'type' => Form::INPUT_WIDGET,
                                    'widgetClass' => '\kartik\widgets\FileInput',
                                    'options' => [   
                                        'options' => ['accept' => 'image/*'],
                                        'pluginOptions' => [
                                            'showUpload' => false,
                                        ],
                                    ],
                                ],
                            ],
                        ]);
                    ?>
                    </div>
                </div>
                <div class="panel-footer">
                <?php echo Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success btn-block' : 'btn btn-primary btn-block']); ?>
                </div>
                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
</div>
