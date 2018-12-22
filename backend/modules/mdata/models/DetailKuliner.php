<?php

namespace backend\modules\mdata\models;

use Yii;

/**
 * This is the model class for table "detail_kuliner".
 *
 * @property int $id
 * @property int $kuliner_id
 * @property string $resep
 * @property string $foto
 *
 * @property Kuliner $kuliner
 */
class DetailKuliner extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'detail_kuliner';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['resep'], 'string'],
            [['kuliner_id'], 'required'],
            [['kuliner_id'], 'integer'],
            [['foto'], 'string', 'max' => 45],
            [['kuliner_id'], 'exist', 'skipOnError' => true, 'targetClass' => Kuliner::className(), 'targetAttribute' => ['kuliner_id' => 'id']],
            [['foto'], 'file', 'extensions' => 'jpg,jpeg,png', 'mimeTypes' => 'image/jpeg, image/png', 'maxSize' => 1024 * 1024 * 1],
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
            'resep' => 'Resep',
            'foto' => 'Gambar',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKuliner()
    {
        return $this->hasOne(Kuliner::className(), ['id' => 'kuliner_id']);
    }
}
