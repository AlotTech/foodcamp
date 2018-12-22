<?php

use backend\modules\mdata\models\Kuliner;
use backend\modules\mdata\models\Store;
use kartik\detail\DetailView;
use yii\helpers\ArrayHelper;

/**
 * @var yii\web\View $this
 * @var backend\modules\mdata\models\StoreKuliner $model
 */

$this->title = 'View / Update Store-Kuliner: ' . ' ' . $model->kuliner->nama;
$this->params['breadcrumbs'][] = ['label' => 'Store Kuliners', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container-fluid">
    <div class="row">
        <div class="store-kuliner-view">
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
                    //'id',
                    [
                        'attribute' => 'kuliner_id',
                        'value' => $model->kuliner->nama,
                        'type' => DetailView::INPUT_DROPDOWN_LIST,
                        'items' => ArrayHelper::map(Kuliner::find()->orderBy('nama')->asArray()->all(), 'id', 'nama'),
                    ],
                    [
                        'attribute' => 'store_id',
                        'value' => $model->store->nama,
                        'type' => DetailView::INPUT_DROPDOWN_LIST,
                        'items' => ArrayHelper::map(Store::find()->orderBy('nama')->asArray()->all(), 'id', 'nama'),
                    ],
                ],
                'deleteOptions' => [
                    'url' => ['delete', 'id' => $model->id],
                ],
                'enableEditMode' => true,
            ]); ?>
        </div>
    </div>
</div>
