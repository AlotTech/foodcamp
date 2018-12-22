<?php

namespace backend\modules\mdata\models;

use Yii;

/**
 * This is the model class for table "store_kuliner".
 *
 * @property int $id
 * @property int $kuliner_id
 * @property int $store_id
 *
 * @property Kuliner $kuliner
 * @property Store $store
 */
class StoreKuliner extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'store_kuliner';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['kuliner_id', 'store_id'], 'integer'],
            [['kuliner_id'], 'exist', 'skipOnError' => true, 'targetClass' => Kuliner::className(), 'targetAttribute' => ['kuliner_id' => 'id']],
            [['store_id'], 'exist', 'skipOnError' => true, 'targetClass' => Store::className(), 'targetAttribute' => ['store_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'kuliner_id' => 'Kuliner',
            'store_id' => 'Store',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKuliner()
    {
        return $this->hasOne(Kuliner::className(), ['id' => 'kuliner_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStore()
    {
        return $this->hasOne(Store::className(), ['id' => 'store_id']);
    }
}
