<?php

namespace backend\modules\mdata\models;

use backend\modules\mdata\models\Log;
use dektrium\user\models\User;
use Yii;

/**
 * This is the model class for table "store".
 *
 * @property int $id
 * @property int $user_id
 * @property string $nama
 * @property string $telepon
 * @property string $alamat
 * @property int $harga_min
 * @property int $harga_max
 * @property string $lokasi
 * @property string $foto
 * @property int $aktif
 *
 * @property JamBuka[] $jamBukas
 * @property User $user
 */
class Store extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'store';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id'], 'required'],
            [['user_id', 'harga_min', 'harga_max', 'aktif'], 'integer'],
            [['alamat', 'lokasi'], 'string'],
            [['nama', 'telepon', 'foto', 'update_by'], 'string', 'max' => 45],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User',
            'nama' => 'Nama',
            'telepon' => 'Telepon',
            'alamat' => 'Alamat',
            'harga_min' => 'Harga Min',
            'harga_max' => 'Harga Max',
            'lokasi' => 'Lokasi',
            'foto' => 'Gambar',
            'aktif' => 'Status Aktif',
            'update_by' => 'Update By',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJamBukas()
    {
        return $this->hasMany(JamBuka::className(), ['store_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStoreKuliners()
    {
        return $this->hasMany(StoreKuliner::className(), ['store_id' => 'id']);
    }

    public function afterSave($insert, $changedAttributes)
    {
        $username = ucwords(Yii::$app->user->identity->username);

        parent::afterSave($insert,$changedAttributes);
        //foreach ($changedAttributes as $key => $value) {
            //$aktif = $changedAttributes[$key]['aktif'];
            //die(print_r($aktif));
            if (!$insert) {
                $log = new Log;
                $log->category = 'Store';
                $log->event = '[Update] '.$this->nama;
                $log->updated_by = $username;
                $log->created_at = time();
                $log->save();
            }
        //}
    }
}
