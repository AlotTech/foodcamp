<?php

namespace backend\modules\mdata\models;

use backend\modules\mdata\models\Kuliner;
use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * KulinerSearch represents the model behind the search form of `backend\modules\mdata\models\Kuliner`.
 */
class KulinerSearch extends Kuliner
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'user_id', 'etnis_id', 'st_halal', 'aktif'], 'integer'],
            [['nama', 'jenis_kuliner', 'detail'], 'safe'],
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
        $query = Kuliner::find();

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
            'user_id' => $this->user_id,
            'etnis_id' => $this->etnis_id,
            'st_halal' => $this->st_halal,
            'aktif' => $this->aktif,
        ]);

        $query->andFilterWhere(['like', 'nama', $this->nama])
              ->andFilterWhere(['like', 'jenis_kuliner', $this->jenis_kuliner])
              ->andFilterWhere(['like', 'detail', $this->detail]);

        return $dataProvider;
    }

    public function searchNonActiveKuliner($params)
    {
        $query = Kuliner::find()->where(['aktif' => 2]);

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
            'user_id' => $this->user_id,
            'etnis_id' => $this->etnis_id,
            'st_halal' => $this->st_halal,
            'aktif' => $this->aktif,
        ]);

        $query->andFilterWhere(['like', 'nama', $this->nama])
              ->andFilterWhere(['like', 'jenis_kuliner', $this->jenis_kuliner])
              ->andFilterWhere(['like', 'detail', $this->detail]);

        return $dataProvider;
    }

    public function searchByuser($idk)
    {
        $query = Kuliner::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

      

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }
          $query->andWhere(['=', 'user_id',$idk]);

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'user_id' => $this->user_id,
            'etnis_id' => $this->etnis_id,
            'st_halal' => $this->st_halal,
            'aktif' => $this->aktif,
        ]);

        $query->andFilterWhere(['like', 'nama', $this->nama])
              ->andFilterWhere(['like', 'jenis_kuliner', $this->jenis_kuliner])
              ->andFilterWhere(['like', 'detail', $this->detail]);

        return $dataProvider;
    }
}
