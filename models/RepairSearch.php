<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Repair;

/**
 * RepairSearch represents the model behind the search form of `app\models\Repair`.
 */
class RepairSearch extends Repair
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_repair', 'id_atm', 'id_user'], 'integer'],
            [['repair', 'date_repair'], 'safe'],
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
        $query = Repair::find();

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
            'id_repair' => $this->id_repair,
            'date_repair' => $this->date_repair,
            'id_atm' => $this->id_atm,
            'id_user' => $this->id_user,
        ]);

        $query->andFilterWhere(['like', 'repair', $this->repair]);

        return $dataProvider;
    }
}
