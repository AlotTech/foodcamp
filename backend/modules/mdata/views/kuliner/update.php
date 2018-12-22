<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var backend\modules\mdata\models\Kuliner $model
 */

$this->title = 'Update Kuliner: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Kuliners', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="kuliner-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
         'modelKuliner' => $modelKuliner,
        'modelsDetail' => $modelsDetail,
    ]) ?>

</div>
