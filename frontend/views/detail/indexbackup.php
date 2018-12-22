<?php

use backend\modules\mdata\models\Provinsi;
use yii\helpers\Html;
use yii\widgets\LinkPager;
?>

  <div class="col-md-2">
  	</div>
  <div class="col-md-10">
 <div class="row">
  <div class="panel panel-success">
      <div class="panel-heading">Search form</div>
      <div class="panel-body">


<?php foreach ($countries as $country): ?>
   
       <div class="col-lg-6 col-md-8 mb-6 ">
                        <div class="thumbnail">
                            <img src="http://placehold.it/320x150" alt="" width="500">
                            <div class="caption">
                                <h4 class="pull-right">
    <?php echo Html::a('Detail', ['view' ,'id' => $country->id], ['class' => 'btn btn-info'])?></h4>
                                <h4><a href="#"><?=$country->nama?></a>
                                </h4>
                                <p>Provinsi : <?php echo Provinsi::findOne($country->provinsi->id)->nama?> </p>
                            </div>
                           
                        </div>
                    </div>

       
<?php endforeach; ?>



</div>
    </div>

</div>


</div>


  
<div class="container">
  <div class="row">
<div class="col-md-2">
  
</div>
 
<div class="col-md-8">
            <div id="custom-search-input">
                <div class="input-group col-md-12">
                    <input type="text" class="form-control input-lg" placeholder="Buscar" />
                    <span class="input-group-btn">
                        <button class="btn btn-info btn-lg" type="button">
                            <i class="glyphicon glyphicon-search"></i>
                        </button>
                    </span>
                </div>
            </div>
   
</div>
<div class="col-md-2">
</div>      
  </div>
</div>
<br>
<div class="container">
  <div class="row">
  
<?php foreach ($countries as $country): ?>
  <!-- Begin of rows -->
    <div class="row carousel-row">
        <div class="col-xs-8 col-xs-offset-2 slide-row">
            <div id="carousel-1" class="carousel slide slide-carousel" data-ride="carousel">
              <!-- Indicators -->
              
            
              <!-- Wrapper for slides -->
              <div class="carousel-inner">
                <div class="item active">
                    <img src="http://lorempixel.com/150/150?rand=1" alt="Image">
                </div>
              
              </div>
            </div>
            <div class="slide-content">
                 <h5>Provinsi : <?php echo Provinsi::findOne($country->provinsi->id)->nama?> </h5>
                <p>
                    Lorem ipsum dolor sit amet, consetetur sadipscing elitr, 
                    sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat
                </p>
            </div>
            <div class="slide-footer">
                <span class="pull-right buttons">
                    <button class="btn btn-sm btn-default"><i class="fa fa-fw fa-eye"></i> Show</button>
                    <button class="btn btn-sm btn-primary"><i class="fa fa-fw fa-shopping-cart"></i> Buy</button>
                </span>
            </div>
        </div>
    </div>

<?php endforeach; ?>    

    </div>
    </div>

    <div class="col-md-2">
      
    </div>
    <div class="col-md-8">
      
<?= LinkPager::widget(['pagination' => $pagination]) ?>
    </div>
    <div class="col-md-2"></div>
<br>
    <style type="text/css">
      
body {
    padding-top: 15px;
    background-color: #f9f9f9;
}

/*REQUIRED*/
.carousel-row {
    margin-bottom: 10px;
}

.slide-row {
    padding: 0;
    background-color: #ffffff;
    min-height: 150px;
    border: 1px solid #e7e7e7;
    overflow: hidden;
    height: auto;
    position: relative;
}


.slide-carousel {
    width: 20%;
    float: left;
    display: inline-block;
}

.slide-carousel .carousel-indicators {
    margin-bottom: 0;
    bottom: 0;
    background: rgba(0, 0, 0, .5);
}

.slide-carousel .carousel-indicators li {
    border-radius: 0;
    width: 20px;
    height: 6px;
}

.slide-carousel .carousel-indicators .active {
    margin: 1px;
}

.slide-content {
    position: absolute;
    top: 0;
    left: 20%;
    display: block;
    float: left;
    width: 80%;
    max-height: 76%;
    padding: 1.5% 2% 2% 2%;
    overflow-y: auto;
}

.slide-content h4 {
    margin-bottom: 3px;
    margin-top: 0;
}

.slide-footer {
    position: absolute;
    bottom: 0;
    left: 20%;
    width: 78%;
    height: 20%;
    margin: 1%;
}

/* Scrollbars */
.slide-content::-webkit-scrollbar {
  width: 5px;
}
 
.slide-content::-webkit-scrollbar-thumb:vertical {
  margin: 5px;
  background-color: #999;
  -webkit-border-radius: 5px;
}
 
.slide-content::-webkit-scrollbar-button:start:decrement,
.slide-content::-webkit-scrollbar-button:end:increment {
  height: 5px;
  display: block;
}
    </style>