<?php 


use backend\modules\mdata\models\Kuliner;
use common\models\User;
use backend\modules\mdata\models\Store;
use backend\modules\mdata\models\Etnis;
use backend\modules\mdata\models\ProvinsiSearch;
use yii\helpers\Html;

use backend\modules\mdata\models\Provinsi;


use yii\helpers\Url;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
?>
  
  <?php
$ip = Yii::$app->component->geoip2->getInfoByIP(); // current user ip
$ip = Yii::$app->component->geoip2->getInfoByIP("8.8.8.8");

$ip->continent; // "North America"
$ip->country; // "United States"
$ip->isoCode; // "US"
$ip->subdivisions; // "California"
$ip->city; // "Mountain View"
$ip->location->longitude; // -122.0838
$ip->location->latitude; // 37.386

die(print_r($ip->city));
  ?>

    <!-- Masthead -->
    <header class="masthead text-white text-center">
      <div class="overlay"></div>
      <div class="container">
        <div class="row">
          <div class="col-xl-9 mx-auto">
            <h5 class="mb-3">Mencari Makanan , minuman dan aneka jajanan  <b> Khas Indonesia</b> </h5>
          </div>
          <div class="col-md-10 col-lg-8 col-xl-7 mx-auto">
             <?php echo   Html::beginForm(['/produk/search'], 'get') ?>
               <div class="form-row">
                <div class="col-12 col-md-9 mb-2 mb-md-0">
                  <input type="email" class="form-control form-control-lg" placeholder="Ingin Berkontribusi promosikan daerah mu ?...">
                </div>
                <div class="col-12 col-md-3">

    <?php  echo Html::a('Buat Akun', ['/register/index'], ['class' => 'btn btn-block btn-lg btn-primary'])?>
                </div>
              </div>
   <?php echo  Html::endForm() ?>
     
            <br>
            <br>
           
            <br>
          </div>

          <div class="col-xl-12">
             <h5 class="mb-3">Atau Pilih dan jelajahi  <b> Khas Indonesia Sesukamu</b> </h5>
         </div>
        </div>
      </div>
    </header>

    <!-- Icons Grid -->
    <section class="features-icons bg-light text-center">
      <div class="container">
        <div class="row">
          <div class="col-lg-4">
            <div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3">
              <div class="features-icons-icon d-flex">
                <?= Html::a(Html::img('@web/mmmkkn.png', ['width'=>'150','height'=>'130']),  ['/user/register'], ['class' => 'm-auto text-primary']) ?>
              </div>
              <br>
              <h3>Makanan Daerah</h3>
             
            </div>
          </div>
          <div class="col-lg-4">
            <div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3">
              <div class="features-icons-icon d-flex">
                  <?= Html::a(Html::img('@web/mnm.png', ['width'=>'150','height'=>'130']),  ['/user/register'], ['class' => 'm-auto text-primary']) ?>
              </div>
              <br>
              <h3>Jajanan Khas</h3>
              
            </div>
          </div>
          <div class="col-lg-4">
            <div class="features-icons-item mx-auto mb-0 mb-lg-3">
              <div class="features-icons-icon d-flex">
                       <?= Html::a(Html::img('@web/minuman.png', ['width'=>'150','height'=>'130']),  ['/user/register'], ['class' => 'm-auto text-primary']) ?>
              </div>
              <br>
              <h3>Aneka Minuman Khas</h3>
             
            </div>
          </div>
        </div>
      </div>
    </section>

<br>
    <div class="container" align="center">

           <div class="row">
            <div class="col-lg-12">
                
                
                  <h6> <div align="left" >Daftar List Provinsi, Jumlah Etnis</div></h6>
               
                       
            </div>
        </div>
    <table width="100%" align="center">
                      
                        <tbody>
        <?php
        $query = ProvinsiSearch::listProv();


        echo'<tr>';
        $counter = 0;
        foreach ($query->each() as $datas) {
            $counter++;
         $nama =   $datas['nama'];
         $kode = $datas['kode'];
        echo'
          <td>'.ucfirst(strtolower($nama)).'<font color="grey"> ('.$kode.') </font> </td>';

         if ($counter == 4){ 
            echo '</tr> <tr>';
            $counter = 0 ;

          
        }
        }


        ?>
        </tbody>
        </table>

         
<br>
    </div>



    <!-- Call to Action -->
    <section class="call-to-action text-white text-center">
      <div class="overlay"></div>
      <div class="container">
        <div class="row">
          <div class="col-xl-12 mx-auto">
            <h2 class="mb-4">FoodCamp </h2>
          </div>
         <!-- <div class="col-md-10 col-lg-8 col-xl-7 mx-auto">
            <form>
              <div class="form-row">
                <div class="col-12 col-md-9 mb-2 mb-md-0">
                  <input type="email" class="form-control form-control-lg" placeholder="Enter your email...">
                </div>

                <div class="col-12 col-md-3">
                  <button type="submit" class="btn btn-block btn-lg btn-primary">Sign up!</button>
                </div>
              </div>
            </form>
          </div>-->
              <div class="col-md-3">
                
                <div class="info-box">
                  <!-- Apply any bg-* class to to the icon to color it -->
                  <span class="info-box-icon bg-aqua"><i class="fa fa-star-o"></i></span>
                  <div class="info-box-content">
                    <div class="info-box-text">Etnis</div>

                    <span class="info-box-number">
                      <?php echo  Etnis::find()->orderBy('id')->count();  ?>
                        
                      </span>
                  </div>
                  <!-- /.info-box-content -->
                </div>


              </div>
               <div class="col-md-3">
              
              <div class="info-box">
                <!-- Apply any bg-* class to to the icon to color it -->
                <span class="info-box-icon bg-aqua"><i class="fa fa-star-o"></i></span>
                <div class="info-box-content">
                  <div class="info-box-text">Kuliner</div>

                  <span class="info-box-number"><?php echo  Kuliner::find()->orderBy('id')->count();?></span>
                </div>
                <!-- /.info-box-content -->
              </div>             
            </div>
               <div class="col-md-3">
              
              <div class="info-box">
                <!-- Apply any bg-* class to to the icon to color it -->
                <span class="info-box-icon bg-aqua"><i class="fa fa-star-o"></i></span>
                <div class="info-box-content">
                  <div class="info-box-text">Store</div>

                  <span class="info-box-number"><?php echo Store::find()->orderBy('id')->count(); ?></span>
                </div>
                <!-- /.info-box-content -->
              </div>             
            </div>
              <div class="col-md-3">
              
              <div class="info-box">
                <!-- Apply any bg-* class to to the icon to color it -->
                <span class="info-box-icon bg-aqua"><i class="fa fa-star-o"></i></span>
                <div class="info-box-content">
                  <div class="info-box-text">User</div>

                  <span class="info-box-number"><?php echo  User::find()->orderBy('id')->count(); ?></span>
                </div>
                <!-- /.info-box-content -->
              </div>             
            </div>
        </div>
      </div>
    </section>
    <?php
     $teams = Provinsi::find()->all();   
    function items($teams)
    {
        $_md5 = hash('md5',$teams->id);
        $items = [];
        foreach ($teams as $team) {
            array_push($items, ['label' => '' . $team->nama .'', 'url' => Url::to(['produk/kategori', 'pr'=>$_md5,'q' => $team->id])]);
        }
        return $items;
    }

  
    ?>
   