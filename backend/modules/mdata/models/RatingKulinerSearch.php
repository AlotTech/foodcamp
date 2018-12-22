<?php

namespace backend\modules\mdata\models;

use backend\modules\mdata\models\RatingKuliner;
use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * RatingKulinerSearch represents the model behind the search form of `backend\modules\mdata\models\RatingKuliner`.
 */
class RatingKulinerSearch extends RatingKuliner
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'user_id', 'kuliner_id'], 'integer'],
            [['rating'], 'number'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = RatingKuliner::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'rating' => $this->rating,
            'user_id' => $this->user_id,
            'kuliner_id' => $this->kuliner_id,
        ]);

        return $dataProvider;
    }
}
