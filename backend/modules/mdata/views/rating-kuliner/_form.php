<?php

use backend\modules\mdata\models\Kuliner;
use kartik\builder\Form;
use kartik\widgets\ActiveForm;
use kartik\rating\StarRating;
use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var backend\modules\mdata\models\RatingKuliner $model
 * @var yii\widgets\ActiveForm $form
 */
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title"><span class="glyphicon glyphicon-pencil"></span> Form Data Rating</h3>
                </div>
                <div class="panel-body">
                    <div class="rating-kuliner-form">
                    <?php $form = ActiveForm::begin(['type' => ActiveForm::TYPE_HORIZONTAL]);
                        echo Form::widget([
                            'model' => $model,
                            'form' => $form,
                            'columns' => 1,
                            'attributes' => [
                                'user_id' => [
                                    'type' => Form::INPUT_TEXT,
                                    'options' => [
                                        'placeholder' => 'User',
                                        'value' => ucwords(Yii::$app->user->identity->username),
                                        'readonly' => true,
                                    ],
                                ],
                                'kuliner_id' => [
                                    'type' => Form::INPUT_TEXT,
                                    'options' => [
                                        'placeholder' => 'Kuliner',
                                        'readonly' => true,
                                    ],
                                ],
                                'rating' => [
                                    'type' => Form::INPUT_WIDGET,
                                    'widgetClass' => '\kartik\rating\StarRating',
                                    'pluginOptions' => ['step' => 0.1]
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
