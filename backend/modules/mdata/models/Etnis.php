<?php

namespace backend\modules\mdata\models;

use Yii;

/**
 * This is the model class for table "etnis".
 *
 * @property int $id
 * @property int $provinsi_id
 * @property string $nama
 * @property string $kode
 * @property string $lokasi
 * @property string $detail
 * @property string $foto
 *
 * @property Provinsi $provinsi
 * @property Kuliner[] $kuliners
 */
class Etnis extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'etnis';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['provinsi_id', 'nama'], 'required'],
            [['provinsi_id'], 'integer'],
            [['detail'], 'string'],
            [['nama', 'lokasi', 'foto'], 'string', 'max' => 45],
            [['kode'], 'string', 'max' => 10],
            [['provinsi_id'], 'exist', 'skipOnError' => true, 'targetClass' => Provinsi::className(), 'targetAttribute' => ['provinsi_id' => 'id']],
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
            'provinsi_id' => 'Provinsi',
            'nama' => 'Nama',
            'kode' => 'Kode',
            'lokasi' => 'Lokasi',
            'detail' => 'Detail',
            'foto' => 'Upload Gambar',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProvinsi()
    {
        return $this->hasOne(Provinsi::className(), ['id' => 'provinsi_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKuliners()
    {
        return $this->hasMany(Kuliner::className(), ['etnis_id' => 'id']);
    }
}
