<?php

/**
 * @var yii\web\View $this
 * @var backend\modules\mdata\models\Kuliner $model
 */

$this->title = 'Create Data Kuliner';
$this->params['breadcrumbs'][] = ['label' => 'Kuliner', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="kuliner-create">
    <div class="page-header">
        <h1><!--?= Html::encode($this->title) ?--></h1>
    </div>
    <?php echo $this->render('_form', [
        //'model' => $model,
        'modelKuliner' => $modelKuliner,
        'modelsDetail' => $modelsDetail,
    ]);?>
</div>
