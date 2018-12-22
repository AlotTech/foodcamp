<?php

namespace backend\modules\mdata\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\mdata\models\StoreKuliner;

/**
 * StoreKulinerSearch represents the model behind the search form about `backend\modules\mdata\models\StoreKuliner`.
 */
class StoreKulinerSearch extends StoreKuliner
{
    public function rules()
    {
        return [
            [['id', 'kuliner_id', 'store_id'], 'integer'],
        ];
    }

    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = StoreKuliner::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'kuliner_id' => $this->kuliner_id,
            'store_id' => $this->store_id,
        ]);

        return $dataProvider;
    }
}
