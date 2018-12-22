<?php
use  yii\bootstrap\Tabs;

use yii\helpers\Html;?>

    <!-- Page Content -->
    <div class="container">

      <div class="row">

        <div class="col-lg-3">
          <h1 class="my-4"><?= $model->nama?></h1>
          <div class="list-group">
            <a href="#" class="list-group-item active">Detail Kuliner</a>
            <a href="#" class="list-group-item">Tempat</a>
          </div>
        </div>
        <!-- /.col-lg-3 -->

        <div class="col-lg-9">

          <div class="card mt-4">
        
            <img src="<?php echo '/foodcamp/'.Yii::$app->urlManagerBackend->baseUrl.'/kuliner/'.$detail->foto?>" height="400" width="900"/>

            <br>

            <br>
  <div class="panel panel-success">
      <div class="panel-heading"> </div>
<br>
<div class="panel-body">
    
              <table class="table bordered striped" width="100">
                <tr>
                  <td>Nama</td>
                  <td>Daerah</td>
                  <td>Etnis</td>
                  <td>Status Halal</td> 
                </tr>
                <tr>
                  
                  <td><?= $model->nama ?></td>
                  <td><?= $model->etnis->provinsi->nama ?></td>
                  <td><?= $model->etnis->nama?></td> 
                  <td><?php  if ($model->st_halal ==1) {
                          $st = "Halal";                    # code...
                  }
                  else {
                    $st = "Tidak Halal";
                  }
                  echo $st?></td> 
                </tr>
              </table>
                         <br><br> 
              <?php
                          echo Tabs::widget([
                    'options' => [
                      'class' => 'nav nav-pills ',
                       ],
                  'items' => [
                      [
                          'label' => 'Detail',
                          'content' => $this->render('dt', ['model' => $model]),
                          
                     //     'active' => true
                      ],
                        [
                          'label' => 'Resep',
                          'content' => $this->render('dtk', ['model' => $model]),
                     //     'active' => true
                      ],
                     
                     
                  ],
              ]);
              ?>
          </div>

          </div>          <!-- /.card -->

          </div>
        
        </div>
        <!-- /.col-lg-9 -->

      </div>

    </div>
<br><br>