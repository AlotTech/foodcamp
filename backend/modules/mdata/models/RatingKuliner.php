<?php

namespace backend\modules\mdata\models;

use dektrium\user\models\User;
use Yii;

/**
 * This is the model class for table "rating_kuliner".
 *
 * @property int $id
 * @property double $rating
 * @property int $user_id
 * @property int $kuliner_id
 *
 * @property Kuliner $kuliner
 * @property User $user
 */
class RatingKuliner extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'rating_kuliner';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['rating'], 'number'],
            [['user_id', 'kuliner_id'], 'required'],
            [['user_id', 'kuliner_id'], 'integer'],
            [['kuliner_id'], 'exist', 'skipOnError' => true, 'targetClass' => Kuliner::className(), 'targetAttribute' => ['kuliner_id' => 'id']],
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
            'rating' => 'Rating',
            'user_id' => 'User',
            'kuliner_id' => 'Kuliner',
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
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}
