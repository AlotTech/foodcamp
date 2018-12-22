<?php

use kartik\widgets\FileInput;
use kartik\widgets\TimePicker;
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use yii\web\JsExpression;
?>

<div class="page sub-page">
    <!--end hero-->
    <!--*********************************************************************************************************-->
    <!--************ CONTENT ************************************************************************************-->
    <!--*********************************************************************************************************-->
    <section class="content">
        <section class="block">
            <div class="container">
            <?php $form = ActiveForm::begin(['id' => 'dynamic-form', 'options' => ['enctype' => 'multipart/form-data']]);?>
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                        <div class="panel panel-success">
                            <div class="panel-heading">
                                <h3 class="panel-title"><span class="glyphicon glyphicon-pencil"></span> Form Store</h3>
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-sm-6">
                                    <?php echo $form->field($model, 'nama')->textInput(['maxlength' => true]) ?>
                                    </div>
                                     <div class="col-sm-6">
                                    <?php echo $form->field($model, 'telepon')->textInput(['maxlength' => true]) ?>
                                    </div>
                                    <div class="col-sm-6">
                                    <?php echo $form->field($model, 'alamat')->textInput() ?>
                                    </div>
                                    <div class="col-sm-3">
                                    <?php echo $form->field($model, 'harga_min')->textInput(['maxlength' => true]) ?>
                                    </div>
                                    <div class="col-sm-3">
                                    <?php echo $form->field($model, 'harga_max')->textInput(['maxlength' => true]) ?>
                                    </div>
                                    <div class="col-sm-6">
                                    <?php echo $form->field($model, 'lokasi')->widget('\pigolab\locationpicker\CoordinatesPicker', [
                                        //'key' => 'AIzaSyCpVQViQfuRHNN3PWd8ORjPhXh3vK6-XdM' ,   // require , Put your google map api key
                                        'valueTemplate' => '{latitude},{longitude}', // Optional , this is default result format
                                        'options' => [
                                            'style' => 'width: 100%; height: 300px', // map canvas width and height
                                        ],
                                        'enableSearchBox' => true, // Optional , default is true
                                        'searchBoxOptions' => [ // searchBox html attributes
                                            'style' => 'width: 300px;', // Optional , default width and height defined in css coordinates-picker.css
                                        ],
                                        'searchBoxPosition' => new JsExpression('google.maps.ControlPosition.TOP_LEFT'), // optional , default is TOP_LEFT
                                        'mapOptions' => [
                                            // google map options
                                            // visit https://developers.google.com/maps/documentation/javascript/controls for other options
                                            'mapTypeControl' => false, // Enable Map Type Control
                                            'mapTypeControlOptions' => [
                                                'style' => new JsExpression('google.maps.MapTypeControlStyle.HORIZONTAL_BAR'),
                                                'position' => new JsExpression('google.maps.ControlPosition.TOP_LEFT'),
                                            ],
                                            'streetViewControl' => true, // Enable Street View Control
                                        ],
                                        'clientOptions' => [
                                            // jquery-location-picker options
                                            'radius' => 300,
                                            'addressFormat' => 'street_number',
                                            'location' => [
                                                'latitude' => -6.352967,
                                                'longitude' => 106.832509,
                                            ],
                                        ],
                                    ]); ?>
                                    </div>
                                    <div class="col-sm-6">
                                        <?php echo $form->field($model, 'foto')->fileInput()?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                        <div class="panel panel-success">
                            <div class="panel-heading">
                                <i class="glyphicon glyphicon-hourglass"></i> Jam Buka dan Tutup
                            </div>
                            <div class="panel-body container-items"><!-- widgetContainer -->
                                <div class="row">
                                    <div class="col-sm-12">
                                    <?php $lists = ['1' => 'Minggu', '2' => 'Senin', '3' => 'Selasa', '4' => 'Rabu', '5' => 'Kamis', '6' => 'Jumat', '7' => 'Sabtu']?>
                                    <?php echo $form->field($modelsHour, 'hari')->inline(true)->checkboxList($lists); ?>
                                    </div>
                                    <div class="col-sm-4">
                                    <?php echo $form->field($modelsHour, "jam_buka")->widget(TimePicker::classname(), [
                                        'pluginOptions' => [
                                            //'showSeconds' => true,
                                            'showMeridian' => false,
                                            //'minuteStep' => 1,
                                        ],
                                        'addonOptions' => [
                                            'asButton' => true,
                                            'buttonOptions' => ['class' => 'btn btn-success'],
                                        ],
                                    ]); ?>
                                    </div>  
                                    <div class="col-sm-4">
                                    <?php echo $form->field($modelsHour, "jam_tutup")->widget(TimePicker::classname(), [
                                        'pluginOptions' => [
                                            //'showSeconds' => true,
                                            'showMeridian' => false,
                                            //'minuteStep' => 1,
                                        ],
                                        'addonOptions' => [
                                            'asButton' => true,
                                            'buttonOptions' => ['class' => 'btn btn-success'],
                                        ],
                                    ]); ?>
                                    </div>
                                </div><!-- end:row -->
                            <div class="panel-footer">
                            <?php echo Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => 'btn btn-success']); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php ActiveForm::end();?>
        </div>
        <!--============ End Items ======================================================================-->
        </section>
        <!--end block-->
    </section>
    <!--end content-->
</div>