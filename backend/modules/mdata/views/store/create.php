<?php

/**
 * @var yii\web\View $this
 * @var backend\modules\mdata\models\Store $model
 */

$this->title = 'Create Data Store';
$this->params['breadcrumbs'][] = ['label' => 'Stores', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="store-create">
    <div class="page-header">
        <h1><!--?= Html::encode($this->title) ?--></h1>
    </div>
    <?php echo $this->render('_form', [
    //'model' => $model,
        'modelStore' => $modelStore,
        'modelsHour' => $modelsHour,
    ]);?>
</div>
