<?php

use kartik\detail\DetailView;

/**
 * @var yii\web\View $this
 * @var backend\modules\mdata\models\RatingKuliner $model
 */

$this->title = 'View / Update Rating: ' . ' ' . $model->kuliner_id;
$this->params['breadcrumbs'][] = ['label' => 'Rating Kuliners', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="container-fluid">
    <div class="row">
        <div class="rating-kuliner-view">
            <div class="page-header">
                <h1><!--?= Html::encode($this->title) ?--></h1>
            </div>
            <?php echo DetailView::widget([
                'model' => $model,
                'condensed' => false,
                'hover' => true,
                'mode' => Yii::$app->request->get('edit') == 't' ? DetailView::MODE_EDIT : DetailView::MODE_VIEW,
                'panel' => [
                    'heading' => $this->title,
                    'type' => DetailView::TYPE_INFO,
                ],
                'attributes' => [
                    'id',
                    'rating',
                    'user_id',
                    'kuliner_id',
                ],
                'deleteOptions' => [
                    'url' => ['delete', 'id' => $model->id],
                ],
                'enableEditMode' => true,
            ]); ?>
        </div>
    </div>
</div>
