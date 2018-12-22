<?php

/**
 * @var yii\web\View $this
 * @var backend\modules\mdata\models\Provinsi $model
 */

$this->title = 'Create Data Provinsi';
$this->params['breadcrumbs'][] = ['label' => 'Provinsi', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="provinsi-create">
    <div class="page-header">
        <h1><!--?= Html::encode($this->title) ?--></h1>
    </div>
    <?php echo $this->render('_form', [
        'model' => $model,
    ]); ?>
</div>