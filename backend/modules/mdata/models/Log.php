<?php

namespace backend\modules\mdata\models;

use Yii;

/**
 * This is the model class for table "log".
 *
 * @property int $id
 * @property string $category
 * @property string $event
 * @property string $updated_by
 * @property int $created_at
 */
class Log extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'log';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['created_at'], 'integer'],
            [['category', 'event', 'updated_by'], 'string', 'max' => 45],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'category' => 'Category',
            'event' => 'Event',
            'updated_by' => 'Updated By',
            'created_at' => 'Created At',
        ];
    }
}
