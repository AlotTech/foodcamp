<?php

namespace backend\modules\mdata\models;

use Yii;

/**
 * This is the model class for table "vw_fcamp".
 *
 * @property int $kulinerid
 * @property string $kuliner
 * @property int $provinsiid
 * @property string $provinsi
 * @property int $etnisid
 * @property string $etnis
 */
class VwFcamp extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'vw_fcamp';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['kulinerid', 'provinsiid', 'etnisid'], 'integer'],
            [['provinsi', 'etnis'], 'required'],
            [['kuliner', 'provinsi', 'etnis'], 'string', 'max' => 45],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'kulinerid' => 'Kulinerid',
            'kuliner' => 'Kuliner',
            'provinsiid' => 'Provinsiid',
            'provinsi' => 'Provinsi',
            'etnisid' => 'Etnisid',
            'etnis' => 'Etnis',
        ];
    }

    public function listKuliner($daerah, $halal, $jenis, $limit, $ofset)
    {
        $st = 2;
        $query = (new \yii\db\Query());
        $query->select('*');
        $query->from('vw_fcamp');
        if ($daerah != null) {
            $query->where(['like', 'kuliner', $daerah]);
            $query->orWhere(['like', 'provinsi', $daerah]);
            $query->orWhere(['like', 'etnis', $daerah]);
        }
        $query->limit($limit);
        $query->offset($offset);
        $query->all();
        return $query;
    }
}
