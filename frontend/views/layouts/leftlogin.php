
<?php 
use yii\helpers\Html;
?>
 <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top" id="sideNav">
      <a class="navbar-brand js-scroll-trigger" href="#page-top">
        <span class="d-block d-lg-none">Start Bootstrap</span>
        <span class="d-none d-lg-block">

                       <?= Html::a(Html::img('@web/logo.png', ['width'=>'150','height'=>'130']),  ['/site/index'], ['class' => 'img-fluid img-profile rounded-circle mx-auto mb-2']) ?>
        </span>
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#about"></a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#experience"></a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#education"></a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#skills"></a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#interests"></a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#awards"></a>
          </li>
        </ul>
      </div>
    </nav>
         