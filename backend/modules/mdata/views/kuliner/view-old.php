<?php

use backend\modules\mdata\models\Etnis;
use kartik\detail\DetailView;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var backend\modules\mdata\models\Kuliner $model
 */

$this->title = 'View / Update Kuliner: ' . ' ' . $model->nama;
$this->params['breadcrumbs'][] = ['label' => 'Kuliner', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kuliner-view">
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
                'attribute' => 'user_id',
                'value' => ucwords(Yii::$app->user->identity->username),
                'displayOnly' => true,
            ],
            'nama',
            'jenis_kuliner',
            [
                'attribute' => 'etnis_id',
                'value' => $model->etnis->nama,
                'type' => DetailView::INPUT_DROPDOWN_LIST,
                'items' => ArrayHelper::map(Etnis::find()->orderBy('nama')->asArray()->all(), 'id', 'nama'),
            ],
            [
                'attribute' => 'st_halal',
                'value' => $model->st_halal,
                'type' => DetailView::INPUT_RADIO_LIST,
                'items' => [0 => 'Halal', 1 => 'Tidak Halal'],
                'options'=> ['inline' => true],
            ],
            [
                'attribute' => 'detail',
                'type' => DetailView::INPUT_TEXTAREA,
                'options'=> ['rows' => 5],
            ],
            [
                'attribute' => 'aktif',
                'value' => $model->aktif,
                'type' => DetailView::INPUT_RADIO_LIST,
                'items' => [0 => 'Aktif', 1 => 'Tidak Aktif'],
                'options'=> ['inline' => true],
            ],
            //rating,
        ],
        'deleteOptions' => [
            'url' => ['delete', 'id' => $model->id],
        ],
        'enableEditMode' => true,
    ])?>

</div>
