<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var backend\modules\mdata\models\RatingKuliner $model
 */

$this->title = 'Create Rating Kuliner';
$this->params['breadcrumbs'][] = ['label' => 'Rating Kuliner', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="rating-kuliner-create">
    <div class="page-header">
        <h1><!--?= Html::encode($this->title) ?--></h1>
    </div>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
