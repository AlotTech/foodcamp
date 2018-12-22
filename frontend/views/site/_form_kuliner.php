<?php

use backend\modules\mdata\models\Etnis;
use dosamigos\ckeditor\CKEditor;
use kartik\select2\Select2;
use kartik\widgets\ActiveForm;
use kartik\widgets\FileInput;
use kidzen\dynamicform\DynamicFormWidget;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var backend\modules\mdata\models\Store $model
 * @var yii\widgets\ActiveForm $form
 */
?>
<div class="page sub-page">
    <section class="content">
        <section class="block">
            <div class="container">
                <div class="kuliner-form">
                <?php $form = ActiveForm::begin(['id' => 'dynamic-form', 'options' => ['enctype' => 'multipart/form-data']]); ?>
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-10 col-md-offset-1">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h3 class="panel-title"><span class="glyphicon glyphicon-pencil"></span> Form Store</h3>
                                    </div>
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-sm-6">
                                            <?php echo $form->field($modelKuliner, 'nama')->textInput(['maxlength' => true]) ?>
                                            </div>
                                            <div class="col-sm-6">
                                            <?php echo $form->field($modelKuliner, 'etnis_id')->widget(Select2::classname(), [
                                                'data' => ArrayHelper::map(Etnis::find()->orderBy('nama')->all(), 'id', 'nama'),
                                                'options' => ['placeholder' => 'Etnis'],
                                                'pluginOptions' => [
                                                    'allowClear' => true,
                                                ],
                                            ]); ?>
                                            </div>
                                            <div class="col-sm-6">
                                            <?php $lists = ['1' => 'Makanan', '2' => 'Minuman', '3' => 'Jajanan']?>
                                            <?php echo $form->field($modelKuliner, 'jenis_kuliner')->widget(Select2::classname(), [
                                                'data' => $lists,
                                                'options' => ['placeholder' => 'Jenis Kuliner'],
                                                'pluginOptions' => [
                                                    'allowClear' => true,
                                                ],
                                            ]); ?>
                                            </div>
                                            <div class="col-sm-3">
                                            <?php echo $form->field($modelKuliner, 'st_halal')->radioButtonGroup(['1' => 'Halal', '2' => 'Tidak Halal'], [
                                                'itemOptions' => [
                                                    'labelOptions' => [
                                                        'class' => 'btn btn-default'
                                                    ],
                                                ],
                                            ]); ?>
                                            </div>
                                            <div class="col-sm-12">
                                            <?php echo $form->field($modelKuliner, 'detail')->textArea(['rows' => '3']); ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-10 col-md-offset-1">
                            <?php DynamicFormWidget::begin([
                                'widgetContainer' => 'dynamicform_wrapper', // required: only alphanumeric characters plus "_" [A-Za-z0-9_]
                                'widgetBody' => '.container-items', // required: css class selector
                                'widgetItem' => '.item', // required: css class
                                'limit' => 1, // the maximum times, an element can be cloned (default 999)
                                'min' => 1, // 0 or 1 (default 1)
                                'insertButton' => '.add-item', // css class
                                'deleteButton' => '.remove-item', // css class
                                'model' => $modelsDetail[0],
                                'formId' => 'dynamic-form',
                                'formFields' => [
                                    'resep',
                                    'foto',
                                ],
                            ]); ?>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <i class="glyphicon glyphicon-pencil"></i> Resep
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="panel-body container-items"><!-- widgetContainer -->
                                    <?php foreach ($modelsDetail as $index => $modelDetail): ?>
                                        <div class="item panel panel-default"><!-- widgetBody -->
                                            <div class="panel-body">
                                            <?php
                                                // necessary for update action.
                                                if (!$modelDetail->isNewRecord) {
                                                    echo Html::activeHiddenInput($modelDetail, "[{$index}]id");
                                                }
                                                ?>
                                                <div class="row">
                                                     <div class="col-sm-12">
                                                    <?php echo $form->field($modelDetail, "[{$index}]resep")->widget(CKEditor::className(), [
                                                        'options' => ['rows' => 5],
                                                        'preset' => 'standard',
                                                    ]); ?>
                                                    </div>
                                                    <div class="col-sm-6">
                                                    <?php echo $form->field($modelDetail, "[{$index}]foto")->widget(FileInput::classname(), [
                                                        'options' => ['accept' => 'image/*'],
                                                        'pluginOptions' => [
                                                            'showUpload' => false,
                                                        ],
                                                    ]); ?>
                                                    </div>
                                                </div><!-- end:row -->
                                            </div>
                                        </div>
                                        <?php endforeach;?>
                                    </div>
                                    <div class="panel-footer">
                                    <?php echo Html::submitButton($modelDetail->isNewRecord ? 'Create' : 'Update', ['class' => 'btn btn-success']); ?>
                                    </div>
                                </div>
                            <?php DynamicFormWidget::end();?>
                            </div>
                        </div>
                    </div>
                <?php ActiveForm::end();?>
                </div>
            </div>
            <!--end container-->
        </section>
        <!--end block-->
    </section>
    <!--end content-->
</div>