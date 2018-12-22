<?php

/*
 * This file is part of the Dektrium project.
 *
 * (c) Dektrium project <http://github.com/dektrium>
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */
use kartik\file\FileInput;
use backend\modules\sdm\models\Pegawai;

use backend\modules\pelanggan\models\Role;

use yii\helpers\ArrayHelper;
use kartik\widgets\Select2;
/**
 * @var yii\widgets\ActiveForm 		$form
 * @var dektrium\user\models\User 	$user
 */
?>

<?php echo $form->field($user, 'nip')->widget(Select2::classname(), [
  
        'data' => ArrayHelper::map(Pegawai::find()->orderBy('nama')->asArray()->all(), 'nip', 'nama'),
     'options' => [
             
                'options' => ['placeholder' =>'Enter Nama Pegawai...',
     'label'=>'Pegawai'],
                'pluginOptions' => [
                 'allowClear' => true
                 ],
             ],
  
    'pluginOptions' => [
        'allowClear' => true
    ],
]);?>

<?php echo $form->field($user, 'role_id')->widget(Select2::classname(), [
  
        'data' => ArrayHelper::map(Role::find()->orderBy('nama')->asArray()->all(), 'id', 'nama'),
     'options' => [
             
                'options' => ['placeholder' =>'Enter Role menu...',],
                'pluginOptions' => [
                 'allowClear' => true
                 ],
             ],
  
    'pluginOptions' => [
        'allowClear' => true
    ],
]);?>

<?= $form->field($user, 'mktkode')->textInput(['maxlength' => 255,'placeholder'=>'Kode marketing']) ?>
<?= $form->field($user, 'email')->textInput(['maxlength' => 255]) ?>
<?= $form->field($user, 'username')->textInput(['maxlength' => 255]) ?>
<?= $form->field($user, 'password')->passwordInput() ?>
<?php /*echo $form->field($user, 'foto')->widget(FileInput::classname(), [
    'options' => ['accept' => 'image/*'],
]);
*/?>
