<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var backend\modules\mdata\models\StoreKuliner $model
 */

$this->title = 'Update Store Kuliner: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Store Kuliners', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="store-kuliner-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
