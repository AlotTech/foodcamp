<?php

/**
 * @var yii\web\View $this
 * @var backend\modules\mdata\models\Etnis $model
 */

$this->title = 'Create Data Etnis';
$this->params['breadcrumbs'][] = ['label' => 'Etnis', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="etnis-create">
    <div class="page-header">
        <h1><!--?= Html::encode($this->title) ?--></h1>
    </div>
    <?php echo $this->render('_form', [
        'model' => $model,
    ]); ?>
</div>