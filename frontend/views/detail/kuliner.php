<?php
use yii\helpers\Url;
use backend\modules\mdata\models\Provinsi;
use backend\modules\mdata\models\VwFcamp;
use yii\helpers\Html;
use yii\widgets\LinkPager;
use kartik\dropdown\DropdownX;
use yii\bootstrap\Dropdown;


use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;
?>
<?php 
 $teams = Provinsi::find()->all();   
    function items($teams)
    {
        $_md5 = hash('md5',$teams->id);
        $items = [];
        foreach ($teams as $team) {
            array_push($items, ['label' => '' . strtolower($team->nama) .'', 'url' => Url::to(['detail/kuliner','q' => $team->id])]);
        }
        return $items;
    }

    $menuItemsKategori[] = [
                    'label' => '-',
                    'items' => items($teams)
                ];
                ?>

<div class="col-md-2"> </div>
<div class="col-md-10">
  
 <?php
  use kartik\widgets\Typeahead;
 $model = new Provinsi;
?>



</div>

<div class="col-md-2">
  
<div class="row">
  <!--<div class="panel panel-primary">
      <div class="panel-heading"> 
        
       
      </div>
    <div class="panel-body">
            <div class="dropdown">
           <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
              Daerah / Provinsi
              <span class="caret"></span>
            </button>
              <?php
                  echo Dropdown::widget([
                      'items' => $menuItemsKategori,
                  ]);
              ?>
          </div> 
          <br>
        
 
    </div>
  </div> -->

  <div class="panel panel-primary">
      <div class="panel-heading"> 
        
       
      </div>
    <div class="panel-body">
         <div class="dropdown">
           <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
              Halal Food
              <span class="caret"></span>
            </button>
              <?php
                  echo Dropdown::widget([
                      'items' => [
                          ['label' => 'Iya', 'url' =>  Url::to(['detail/kuliner','hl' =>1])],
                          ['label' => 'Tidak', 'url' => Url::to(['detail/kuliner','hl' =>2])],

                      ],
                  ]);
              ?>
          </div> 
        
           <!--   <div class="dropdown">
           <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
              Etnis
              <span class="caret"></span>
            </button>
              <?php
                  echo Dropdown::widget([
                      'items' => [
                          ['label' => 'Makanan', 'url' => '/'],
                          ['label' => 'Minuman', 'url' => '#'],

                      ],
                  ]);
              ?>
          </div> -->
          <br>

            <div class="dropdown">
           <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
              Kategori
              <span class="caret"></span>
            </button>
              <?php
                  echo Dropdown::widget([
                      'items' => [
                          ['label' => 'Makanan', 'url' => Url::to(['detail/kuliner','jk' =>1])],
                          ['label' => 'Minuman', 'url' => Url::to(['detail/kuliner','jk' =>2]) ],

                      ],
                  ]);
              ?>
          </div> 
 
    </div>
  </div>

</div>
       
      

  </div>
<div class="col-md-1">
</div>
<div class="col-md-9">
<div class="row">
 
<div class="panel panel-default">
      <div class="panel-heading"> 

        <?php

  $form = ActiveForm::begin([
      'layout' => 'inline',
      'action' => ['kuliner'],
      'method' => 'get',
      'class' => 'form-horizontal',    
  ]); 
 $values = Provinsi::find()->select('nama')->all();
                            foreach ($data as $key => $value) {
                                $values[] = $value['noinvoice'];
                            }?>

                            <?php
                            $values = array();
                            $data = VwFcamp::find()->all();
                          //  $data = Provinsi::find()->select('nama')->all();
                            foreach ($data as $key => $value) {
                                $values[]= $value['kuliner'];
                                 $values[]= $value['provinsi'];
                                  $values[]= $value['etnis'];
                            };
                            echo $form->field($model, 'nama')->label(false)->widget(Typeahead::classname(), [
                                'options' => ['placeholder' => 'Pilih Daerah '],
                                'pluginOptions' => ['highlight'=>true],
                                'dataset' => [
                                    [
                                        'local' => $values,
                                        'limit' => 10, 
                                        'templates' => [
                                            'notFound' => '<div class="text-danger" style="padding:0 8px">Data tidak ditemukan.</div>'
                                        ]
                                    ]
                                ]
                            ]);
                        ?>

                            <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
                      <?= Html::a(Yii::t('app', 'Cancel'), ['kuliner'], ['class' => 'btn btn-info']) ?>
   
                      &nbsp; Kategori :
                      <?php 
                      if (!empty($_GET['Provinsi']['nama']) ) {
                        # code...
                        echo "Daerah ".$_GET['Provinsi']['nama'];
                      }

                      else if (!empty($_GET["hl"])) {
                        # code...
                        $st = $_GET["hl"] == 1 ? "Iya" : "Tidak" ;
                        echo "Status Halal ".$st;
                      }
                      else if (!empty($_GET["jk"])) {
                        # code...
                         $st = $_GET["jk"] == 1 ? "Makanan" : "Minuman" ;
                        echo "Jenis kuliner ".$st;
                      }
                      ?>

                        <?php ActiveForm::end(); ?>
     
      </div>
    <div class="panel-body">


      <?php

      $daerah = $_GET['Provinsi']['nama'];
      $halal  = $_GET["hl"];
      $jenis = $_GET["jk"];
      $ofset = $pagination->offset;
      $limit = $pagination->limit;
   
        $countries =  VwFcamp::listKuliner($daerah,$halal,$jenis,$limit,$ofset);
       foreach ($countries->each() as $country): ?>
         
             <div class="col-lg-4 col-md-6 mb-4 ">
                              <div class="thumbnail">
                                  <img src="http://placehold.it/320x150" alt="" width="500">
                                  <div class="caption">
                                      <h4 class="pull-right">
          <?php echo Html::a('Detail', ['viewkl' ,'id' => $country['kulinerid']], ['class' => 'btn btn-info'])?></h4>
                                      <h4><a href="#"><?=$country['kuliner']?></a>
                                      </h4>
                             <p>Etnis : <?php echo strtolower($country['etnis']." / ".$country['provinsi'])?> </p>
                                  </div>
                                 
                              </div>
                          </div>

             
      <?php endforeach; ?>
</div>
</div>


<?= LinkPager::widget(['pagination' => $pagination]) ?>
</div>


