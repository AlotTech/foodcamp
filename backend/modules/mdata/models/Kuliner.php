<?php

namespace backend\modules\mdata\models;

use dektrium\user\models\User;
use Yii;

/**
 * This is the model class for table "kuliner".
 *
 * @property int $id
 * @property int $user_id
 * @property string $nama
 * @property int $etnis_id
 * @property string $jenis_kuliner
 * @property int $st_halal
 * @property string $detail
 * @property int $aktif
 *
 * @property DetailKuliner[] $detailKuliners
 * @property User $user
 * @property Etnis $etnis
 * @property RatingKuliner[] $ratingKuliners
 */
class Kuliner extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'kuliner';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'etnis_id'], 'required'],
            [['user_id', 'etnis_id', 'st_halal', 'aktif'], 'integer'],
            [['detail'], 'string'],
            [['nama'], 'string', 'max' => 45],
            [['jenis_kuliner'], 'string', 'max' => 1],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
            [['etnis_id'], 'exist', 'skipOnError' => true, 'targetClass' => Etnis::className(), 'targetAttribute' => ['etnis_id' => 'id']],
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
            'etnis_id' => 'Etnis',
            'jenis_kuliner' => 'Jenis Kuliner',
            'st_halal' => 'Status Halal',
            'detail' => 'Detail',
            'aktif' => 'Status Aktif',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDetailKuliners()
    {
        return $this->hasMany(DetailKuliner::className(), ['kuliner_id' => 'id']);
    }

    public function getFoto($model)
    {
        $currentPhoto = '';
        foreach ($model->detailKuliners as $photo) {
            $currentPhoto = $photo->foto;
        }
        return $currentPhoto;
    }

    public function getResep($model)
    {
        $currentRecipe = '';
        foreach ($model->detailKuliners as $recipe) {
            $currentRecipe = $recipe->resep;
        }
        return $currentRecipe;
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
    public function getEtnis()
    {
        return $this->hasOne(Etnis::className(), ['id' => 'etnis_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRatingKuliners()
    {
        return $this->hasMany(RatingKuliner::className(), ['kuliner_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStoreKuliners()
    {
        return $this->hasMany(StoreKuliner::className(), ['kuliner_id' => 'id']);
    }
}
