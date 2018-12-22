<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var yii\web\View $this
 * @var backend\modules\mdata\models\StoreSearch $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="store-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'nama') ?>

    <?= $form->field($model, 'alamat') ?>

    <?= $form->field($model, 'tlp') ?>

    <?= $form->field($model, 'jam_buka') ?>

    <?php // echo $form->field($model, 'jam_tutup') ?>

    <?php // echo $form->field($model, 'hari') ?>

    <?php // echo $form->field($model, 'kuliner_id') ?>

    <?php // echo $form->field($model, 'foto') ?>

    <?php // echo $form->field($model, 'user_id') ?>

    <?php // echo $form->field($model, 'lokasi') ?>

    <?php // echo $form->field($model, 'harga') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
