<?php

/*
 * This file is part of the Dektrium project.
 *
 * (c) Dektrium project <http://github.com/dektrium>
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */
use yii\bootstrap\ActiveForm;
use kartik\file\FileInput;
use backend\modules\sdm\models\Pegawai;


use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use kartik\widgets\Select2;
/**
 * @var yii\widgets\ActiveForm 		$form
 * @var dektrium\user\models\User 	$user
 */
?>
   <?php $form = ActiveForm::begin(['options' => ['enctype'=>'multipart/form-data']]); //$form = ActiveForm::begin(['id' => 'form-signup']); ?>

<?php echo $form->field($model, 'nip')->widget(Select2::classname(), [
  
        'data' => ArrayHelper::map(Pegawai::find()->orderBy('nama')->asArray()->all(), 'nip', 'nama'),
     'options' => [
             
                'options' => ['placeholder' =>'Enter Nama Pegawai...',],
                'pluginOptions' => [
                 'allowClear' => true
                 ],
             ],
  
    'pluginOptions' => [
        'allowClear' => true
    ],
]);?>

<?= $form->field($model, 'mktkode')->textInput(['maxlength' => 255,'placeholder'=>'Kode marketing']) ?>
<?= $form->field($model, 'email')->textInput(['maxlength' => 255]) ?>
<?= $form->field($model, 'username')->textInput(['maxlength' => 255]) ?>
<?= $form->field($model, 'password')->passwordInput() ?>



                <div class="form-group">
                    <div class="col-lg-offset-3 col-lg-9">
             
        <?php echo Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
   
                  </div>
                </div>

                <?php ActiveForm::end(); ?>


