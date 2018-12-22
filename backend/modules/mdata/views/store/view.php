<?php

use backend\modules\mdata\models\Kuliner;
use kartik\select2\Select2;
use kartik\widgets\ActiveForm;
use kartik\widgets\TimePicker;
use kidzen\dynamicform\DynamicFormWidget;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\web\JsExpression;
use kartik\widgets\FileInput;
use kartik\field\FieldRange;

/**
 * @var yii\web\View $this
 * @var backend\modules\mdata\models\Store $model
 * @var yii\widgets\ActiveForm $form
 */

$js = '
jQuery(".dynamicform_wrapper").on("afterInsert", function(e, item) {
    jQuery(".dynamicform_wrapper .panel-title-address").each(function(index) {
        jQuery(this).html("Jadwal: " + (index + 1))
    });
});

jQuery(".dynamicform_wrapper").on("afterDelete", function(e) {
    jQuery(".dynamicform_wrapper .panel-title-address").each(function(index) {
        jQuery(this).html("Jadwal: " + (index + 1))
    });
});
';

$this->title = 'View / Update Store: ' . ' ' . $modelStore->nama;
$this->params['breadcrumbs'][] = ['label' => 'Store', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$this->registerJs($js);
?>

<div class="page-header">
    <h1><!--?= Html::encode($this->title) ?--></h1>
</div>
<div class="store-form">
<?php $form = ActiveForm::begin(['id' => 'dynamic-form']);?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-success">
                    <div class="panel-heading">
                        <h3 class="panel-title"><span class="glyphicon glyphicon-pencil"></span> Form Store</h3>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-sm-6">
                            <?php echo $form->field($modelStore, 'nama')->textInput(['maxlength' => true])?>
                            </div>
                            <div class="col-sm-3">
                            <?php echo $form->field($modelStore, 'telepon')->textInput(['maxlength' => true])?>
                            </div>
                            <div class="col-sm-3">
                            <?php echo $form->field($modelStore, 'aktif')->radioButtonGroup(['1' => 'Aktif', '2' => 'Tidak Aktif'], [
                                'itemOptions' => [
                                    'labelOptions' => [
                                        'class' => 'btn btn-default'
                                    ],
                                ],
                            ]); ?>
                            </div>
                            <div class="col-sm-6">
                            <?php echo $form->field($modelStore, 'alamat')->textInput()?>
                            </div>
                            <div class="col-sm-6">
                            <?php echo FieldRange::widget([
                                'form' => $form,
                                'model' => $modelStore,
                                'label' => 'Harga',
                                'attribute1' => 'harga_min',
                                'attribute2' => 'harga_max',
                                'type' => FieldRange::INPUT_SPIN,
                                'widgetOptions1' => [
                                    'pluginOptions' => [
                                        'min' => 1000,
                                        'max' => 1000000,
                                        'step' => 1000,
                                        //'prefix' => 'Rp',
                                    ],               
                                ],
                                'widgetOptions2' => [
                                    'pluginOptions' => [
                                        'min' => 1000,
                                        'max' => 1000000,
                                        'step' => 1000,
                                        //'prefix' => 'Rp',
                                    ],               
                                ],
                            ])?>
                            </div>
                            <div class="col-sm-12">
                            <?php echo $form->field($modelStore, 'lokasi')->widget('\pigolab\locationpicker\CoordinatesPicker' , [
                                //'key' => 'AIzaSyCpVQViQfuRHNN3PWd8ORjPhXh3vK6-XdM' ,   // require , Put your google map api key
                                'valueTemplate' => '{latitude},{longitude}' , // Optional , this is default result format
                                'options' => [
                                    'style' => 'width: 100%; height: 300px',  // map canvas width and height
                                ] ,
                                'enableSearchBox' => true , // Optional , default is true
                                'searchBoxOptions' => [ // searchBox html attributes
                                    'style' => 'width: 300px;', // Optional , default width and height defined in css coordinates-picker.css
                                ],
                                'searchBoxPosition' => new JsExpression('google.maps.ControlPosition.TOP_LEFT'), // optional , default is TOP_LEFT
                                'mapOptions' => [
                                    // google map options
                                    // visit https://developers.google.com/maps/documentation/javascript/controls for other options
                                    'mapTypeControl' => false, // Enable Map Type Control
                                    'mapTypeControlOptions' => [
                                          'style'    => new JsExpression('google.maps.MapTypeControlStyle.HORIZONTAL_BAR'),
                                          'position' => new JsExpression('google.maps.ControlPosition.TOP_LEFT'),
                                    ],
                                    'streetViewControl' => true, // Enable Street View Control
                                ],
                                'clientOptions' => [
                                    // jquery-location-picker options
                                    'radius'    => 300,
                                    'addressFormat' => 'street_number',
                                    'location' => [
                                        'latitude'  => -6.352967,
                                        'longitude' => 106.832509,
                                    ],
                                ]
                            ]);
                            ?>
                            </div>
                            <div class="col-sm-6">
                            <?php echo $form->field($modelStore, 'foto')->widget(FileInput::classname(), [
                                'options' => ['accept' => 'image/*'],
                                'pluginOptions' => [
                                    'showUpload' => false,
                                ],
                            ]);?>
                            </div>
                            <div class="col-sm-6">
                                <b>Gambar Sekarang</b><br>
                                <?php
                                    $photo = Html::img(Yii::getAlias('@web') . '/uploads/store/' . $modelStore->foto);
                                    echo '<img style="width: 300px; height: 300px"'.$photo;
                                ?>
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
                'limit' => 999, // the maximum times, an element can be cloned (default 999)
                'min' => 1, // 0 or 1 (default 1)
                'insertButton' => '.add-item', // css class
                'deleteButton' => '.remove-item', // css class
                'model' => $modelsHour[0],
                'formId' => 'dynamic-form',
                'formFields' => [
                    'hari',
                    'jam_buka',
                    'jam_tutup',
                ],
            ]);?>
                <div class="panel panel-success">
                    <div class="panel-heading">
                        <i class="glyphicon glyphicon-hourglass"></i> Jam Buka dan Tutup
                        <button type="button" class="pull-right add-item btn btn-success btn-xs"><i class="fa fa-plus"></i> Add</button>
                        <div class="clearfix"></div>
                    </div>
                    <div class="panel-body container-items"><!-- widgetContainer -->
                    <?php foreach ($modelsHour as $index => $modelHour): ?>
                        <div class="item panel panel-default"><!-- widgetBody -->
                            <div class="panel-heading">
                                <span class="panel-title-address">Jadwal: <?php echo ($index + 1)?></span>
                                <button type="button" class="pull-right remove-item btn btn-danger btn-xs"><i class="fa fa-minus"> Remove</i></button>
                                <div class="clearfix"></div>
                            </div>
                            <div class="panel-body">
                            <?php
                                // necessary for update action.
                                if (!$modelHour->isNewRecord) {
                                    echo Html::activeHiddenInput($modelHour, "[{$index}]id");
                                }
                            ?>
                                <div class="row">
                                    <div class="col-sm-4">
                                    <?php $lists = ['1' => 'Minggu', '2' => 'Senin', '3' => 'Selasa', '4' => 'Rabu', '5' => 'Kamis', '6' => 'Jumat', '7' => 'Sabtu']?>
                                    <?php echo $form->field($modelHour, "[{$index}]hari")->widget(Select2::classname(), [
                                        'data' => $lists,
                                        'options' => ['placeholder' => 'Hari'],
                                        'pluginOptions' => [
                                            'allowClear' => true,
                                        ],
                                    ])?>
                                    </div>
                                    <div class="col-sm-4">
                                    <?php echo $form->field($modelHour, "[{$index}]jam_buka")->widget(TimePicker::classname(), [
                                        'pluginOptions' => [
                                            //'showSeconds' => true,
                                            'showMeridian' => false,
                                            //'minuteStep' => 1,
                                        ],
                                        'addonOptions' => [
                                            'asButton' => true,
                                            'buttonOptions' => ['class' => 'btn btn-success']
                                        ]
                                    ]);?>
                                    </div>
                                    <div class="col-sm-4">
                                    <?php echo $form->field($modelHour, "[{$index}]jam_tutup")->widget(TimePicker::classname(), [
                                         'pluginOptions' => [
                                            //'showSeconds' => true,
                                            'showMeridian' => false,
                                            //'minuteStep' => 1,
                                        ],
                                        'addonOptions' => [
                                            'asButton' => true,
                                            'buttonOptions' => ['class' => 'btn btn-success']
                                        ]
                                    ]);?>
                                    </div>
                                </div><!-- end:row -->
                            </div>
                        </div>
                        <?php endforeach;?>
                    </div>
                    <div class="panel-footer">
                    <?php echo Html::submitButton($modelHour->isNewRecord ? 'Create' : 'Update', ['class' => 'btn btn-success']);?>
                    </div>
                </div>
            <?php DynamicFormWidget::end();?>
            </div>
        </div>
    </div>
<?php ActiveForm::end();?>
</div>
