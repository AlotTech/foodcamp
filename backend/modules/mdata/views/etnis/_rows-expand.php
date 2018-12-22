<?php

use yii\helpers\Html;
?>

<div class="container">
    <div class="alert alert-default text-justify">
    <?php
        $photo = Html::img(Yii::getAlias('@web') . '/uploads/etnis/' . $model->foto);
        echo '<img class="img-rounded center-block" style="width: 500px; height: 300px"'.$photo;
    ?>
    </div>
    <div class="alert alert-info text-center">
    <?php
        $detail = $model->detail;
        echo wordwrap($detail, 150, "<br>\n");
    ?>
    </div>
</div>