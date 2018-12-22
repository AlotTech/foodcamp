<?php

/**
 * @var yii\web\View $this
 * @var backend\modules\mdata\models\StoreKuliner $model
 */

$this->title = 'Create Store Kuliner';
$this->params['breadcrumbs'][] = ['label' => 'Store Kuliners', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="store-kuliner-create">
    <div class="page-header">
        <h1><!--?= Html::encode($this->title) ?--></h1>
    </div>
    <?php echo $this->render('_form', [
        'model' => $model,
    ])?>
</div>
