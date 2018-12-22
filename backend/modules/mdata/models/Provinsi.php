<?php

namespace backend\modules\mdata\models;

use Yii;

/**
 * This is the model class for table "provinsi".
 *
 * @property int $id
 * @property string $nama
 * @property string $kode
 * @property string $foto
 *
 * @property Etnis[] $etnis
 */
class Provinsi extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'provinsi';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nama'], 'required'],
            [['nama', 'kode', 'foto'], 'string', 'max' => 45],
            [['foto'], 'file', 'extensions' => 'jpg,jpeg,png', 'mimeTypes' => 'image/jpeg, image/png', 'maxSize' => 1024 * 1024 * 1],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nama' => 'Nama',
            'kode' => 'Kode',
            'foto' => 'Upload Gambar',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEtnis()
    {
        return $this->hasMany(Etnis::className(), ['provinsi_id' => 'id']);
    }
}
