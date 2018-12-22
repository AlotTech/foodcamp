<?php

use yii\helpers\Html;
?>

<div class="container">
    <div class="alert alert-default text-justify">
    <?php
        $photo = Html::img(Yii::getAlias('@web') . '/uploads/provinsi/' . $model->foto);
        echo '<img class="img-rounded center-block" style="width: 500px; height: 300px"'.$photo;
    ?>
    </div>
</div>