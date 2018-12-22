<?php
use yii\helpers\Html;?>

    <!-- Page Content -->
    <div class="container">

      <div class="row">

        <div class="col-lg-3">
          <h1 class="my-4">Etnis : <?= $model->nama?></h1>
          <div class="list-group">
            <a href="#" class="list-group-item active">Detail Etnis</a>
            <a href="#" class="list-group-item">Category 2</a>
            <a href="#" class="list-group-item">Category 3</a>
          </div>
        </div>
        <!-- /.col-lg-3 -->

        <div class="col-lg-9">

          <div class="card mt-4">
        
                    <img src="<?php echo '/foodcamp/'.Yii::$app->urlManagerBackend->baseUrl.'/'.$model->foto?>" height="400" width="900"/>


            <div class="card-body">
              <h3 class="card-title">Etnis : <?= $model->nama?> / Daerah : <?= $model->provinsi->nama?> </h3>
              <p class="card-text"><?= $model->detail?></p>
            
            </div>
          </div>
          <!-- /.card -->

        
        </div>
        <!-- /.col-lg-9 -->

      </div>

    </div>
<br><br>