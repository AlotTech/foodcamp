<?php
use kartik\form\ActiveForm;
use kartik\file\FileInput;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
//use kartik\widgets\ActiveForm;
//use kartik\builder\Form;
use kartik\widgets\DatePicker;

use kartik\datecontrol\DateControl;
use backend\modules\mdata\models\Kuliner;
use kartik\widgets\Select2;
?>


 <?php  $form = ActiveForm::begin(['type'=>ActiveForm::TYPE_HORIZONTAL,'options' => ['enctype'=>'multipart/form-data']]); ?>
 <div class="container-fluid">
  <div class="row">
	<div class="col-md-12">
   		<div class="panel panel-success">
      <div class="panel-heading">Form Tambah Toko</div>
      <div class="panel-body">
      	

				<div class="col-md-6">
					
				   <?= $form->field($model, 'nama')->textInput(['placeholder'=>'Nama Toko']);?>


					<?php echo $form->field($model, 'tlp', [
					    'feedbackIcon' => [
					        'prefix' => 'fa fa-',
					        'default' => 'phone',
					        'success' => 'check-circle',
					        'error' => 'exclamation-circle',
					    ]
					])->widget('yii\widgets\MaskedInput', [
					    'mask' => '999-999-9999'
					]);
					?>
				   <?= $form->field($model, 'alamat')->textarea(['rows' => '6']) ?>


				
				</div>
					<div class="col-md-6">
How it works 
If you are the owner of a restaurant, or if you are a user who's discovered a place not listed on Zomato, let us know using this form.

Once you send the information to us, our awesome content team will verify it. To help speed up the process, please provide a contact number or email address.

That's it! Once verified the listing will start appearing on Zomato

			<?php /*		<?php echo $form->field($model, 'kuliner_id')->widget(Select2::classname(), [
								  
								        'data' => ArrayHelper::map(Kuliner::find()->orderBy('nama')->asArray()->all(), 'id', 'nama'),
								     'options' => [
								             
								                'options' => ['placeholder' =>'Enter Nama Kuliner',],
								                'pluginOptions' => [
								                 'allowClear' => true
								                 ],
								             ],
								  
								    'pluginOptions' => [
								        'allowClear' => true
								    ],
					]);?>


				   <?= $form->field($model, 'harga')->textInput(['placeholder'=>'Harga']);?>
				*/?>
				</div> 
     	 </div>
    </div>




</div>
<div class="col-md-6">
 	 <div class="panel panel-success">
      <div class="panel-heading">Time</div>
      <div class="panel-body">
      	

			<div class="col-md-12">
				
		   <hr>
				   	   <?php
$data = [0 => 'Sun', 1 => 'Mon', 2 => 'Tue', 3 => 'Wed', 4 => 'Thu', 5 => 'Fri', 6 => 'Sat'];

		// Simple basic usage

echo $form->field($model, 'hari')->checkboxList($data, ['inline'=>true]);
?>
<?php
echo DatePicker::widget([
    'model' => $model,
    'attribute' => 'jam_buka',
    'attribute2' => 'jam_tutup',
    'options' => ['placeholder' => 'Start date'],
    'options2' => ['placeholder' => 'End date'],
    'type' => DatePicker::TYPE_RANGE,
    'form' => $form,
    'pluginOptions' => [
        'format' => 'hh:mm:ss',
        'autoclose' => true,
    ]
]);?>
	
			<br>
			</div>

 
     	 </div>
     </div>


</div>
<div class="col-md-6">
		 <div class="panel panel-success">
	      <div class="panel-heading">Upload Foto</div>
	      <div class="panel-body">
	      	
				<div class="col-md-12">
					
					<?php echo $form->field($model, 'foto')->widget(FileInput::classname(), [
					    'options' => ['accept' => 'image/*'],
					]);
					?>

				</div>
	 
	     	 </div>
	  </div>

</div>


<div class="col-md-12">
    <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success btn-block' : 'btn btn-primary btn-block']) ?>
   </div>

    </div>

</div>



    <?php ActiveForm::end(); ?>