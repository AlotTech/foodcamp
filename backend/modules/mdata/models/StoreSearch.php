<?php

namespace backend\modules\mdata\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\mdata\models\Store;

/**
 * StoreSearch represents the model behind the search form about `backend\modules\mdata\models\Store`.
 */
class StoreSearch extends Store
{
    public function rules()
    {
        return [
            [['id', 'user_id', 'harga_min', 'harga_max', 'aktif'], 'integer'],
            [['nama', 'telepon', 'alamat', 'lokasi', 'foto'], 'safe'],
        ];
    }

    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = Store::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'user_id' => $this->user_id,
            'harga_min' => $this->harga_min,
            'harga_max' => $this->harga_max,
            'aktif' => $this->aktif,
        ]);

        $query->andFilterWhere(['like', 'nama', $this->nama])
            ->andFilterWhere(['like', 'telepon', $this->telepon])
            ->andFilterWhere(['like', 'alamat', $this->alamat])
            ->andFilterWhere(['like', 'lokasi', $this->lokasi])
            ->andFilterWhere(['like', 'foto', $this->foto]);

        return $dataProvider;
    }

    public function searchNonActiveStore($params)
    {
        $query = Store::find()->where(['aktif' => 2]);

        $dataProvider2 = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider2;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'user_id' => $this->user_id,
            'harga_min' => $this->harga_min,
            'harga_max' => $this->harga_max,
            'aktif' => $this->aktif,
        ]);

        $query->andFilterWhere(['like', 'nama', $this->nama])
            ->andFilterWhere(['like', 'telepon', $this->telepon])
            ->andFilterWhere(['like', 'alamat', $this->alamat])
            ->andFilterWhere(['like', 'lokasi', $this->lokasi])
            ->andFilterWhere(['like', 'foto', $this->foto]);

        return $dataProvider;
    }

       public function searchByusr($idk)
    {
        $query = Store::find();


          $query->andWhere(['=', 'user_id',$idk]);
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if ($this->validate()) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'user_id' => $this->user_id,
            'harga_min' => $this->harga_min,
            'harga_max' => $this->harga_max,
            'aktif' => $this->aktif,
        ]);

        $query->andFilterWhere(['like', 'nama', $this->nama])
            ->andFilterWhere(['like', 'telepon', $this->telepon])
            ->andFilterWhere(['like', 'alamat', $this->alamat])
            ->andFilterWhere(['like', 'lokasi', $this->lokasi])
            ->andFilterWhere(['like', 'foto', $this->foto]);

        return $dataProvider;
    }
}
