<?php

namespace backend\modules\mdata\models;

use Yii;

/**
 * This is the model class for table "jam_buka".
 *
 * @property int $id
 * @property int $store_id
 * @property int $hari
 * @property string $jam_buka
 * @property string $jam_tutup
 *
 * @property Store $store
 */
class JamBuka extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'jam_buka';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['store_id'], 'required'],
            [['store_id', 'hari'], 'integer'],
            [['jam_buka', 'jam_tutup'], 'safe'],
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
            'store_id' => 'Store ID',
            'hari' => 'Hari',
            'jam_buka' => 'Jam Buka',
            'jam_tutup' => 'Jam Tutup',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStore()
    {
        return $this->hasOne(Store::className(), ['id' => 'store_id']);
    }
}
