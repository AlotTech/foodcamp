<?php

use backend\modules\mdata\models\DetailKuliner;

$model = DetailKuliner::find()
        ->where(['kuliner_id' => $model->id])
        ->one();

        echo $model->resep;
?>