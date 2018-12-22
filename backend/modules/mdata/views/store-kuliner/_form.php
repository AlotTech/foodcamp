<?php

use backend\modules\mdata\models\Kuliner;
use backend\modules\mdata\models\Store;
use kartik\builder\Form;
use kartik\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var backend\modules\mdata\models\StoreKuliner $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title"><span class="glyphicon glyphicon-pencil"></span> Form Store Kuliner</h3>
                </div>
                <div class="panel-body">
                    <div class="store-kuliner-form">
                    <?php $form = ActiveForm::begin(['type' => ActiveForm::TYPE_HORIZONTAL]);
                        echo Form::widget([
                            'model' => $model,
                            'form' => $form,
                            'columns' => 1,
                            'attributes' => [
                                'kuliner_id' => [
                                    'type' => Form::INPUT_WIDGET,
                                    'widgetClass' => '\kartik\widgets\Select2',
                                    'options' => [
                                        'data' => ArrayHelper::map(Kuliner::find()->all(), 'id', 'nama'),
                                        'options' => ['placeholder' => 'Pilih Kuliner'],
                                        'pluginOptions' => [
                                            'allowClear' => true,
                                        ],
                                    ],
                                ],
                                'store_id' => [
                                    'type' => Form::INPUT_WIDGET,
                                    'widgetClass' => '\kartik\widgets\Select2',
                                    'options' => [
                                        'data' => ArrayHelper::map(Store::find()->all(), 'id', 'nama'),
                                        'options' => ['placeholder' => 'Pilih Store'],
                                        'pluginOptions' => [
                                            'allowClear' => true,
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
                <?php ActiveForm::end();?>
            </div>
        </div>
    </div>
</div>