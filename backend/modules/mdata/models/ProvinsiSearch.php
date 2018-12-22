<?php

namespace backend\modules\mdata\models;

use backend\modules\mdata\models\Provinsi;
use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * ProvinsiSearch represents the model behind the search form of `backend\modules\mdata\models\Provinsi`.
 */
class ProvinsiSearch extends Provinsi
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['nama', 'kode', 'foto'], 'safe'],
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
        $query = Provinsi::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => false,
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
        ]);

        $query->andFilterWhere(['like', 'nama', $this->nama])
              ->andFilterWhere(['like', 'kode', $this->kode])
              ->andFilterWhere(['like', 'foto', $this->foto]);

        return $dataProvider;
    }

        public function listProv(){
           $query= (new \yii\db\Query());
           $query->select("nama,kode");
           $query->from('provinsi');
           $query->all();
        return $query;
    }
}
