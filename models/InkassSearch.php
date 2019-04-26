<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Inkass;

/**
 * InkassSearch represents the model behind the search form of `app\models\Inkass`.
 */
class InkassSearch extends Inkass
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_inkass', 'id_atm', 'id_user'], 'integer'],
            [['amount_inkass', 'date_inkass'], 'safe'],
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
        $query = Inkass::find();

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
            'id_inkass' => $this->id_inkass,
            'date_inkass' => $this->date_inkass,
            'id_atm' => $this->id_atm,
            'id_user' => $this->id_user,
        ]);

        $query->andFilterWhere(['like', 'amount_inkass', $this->amount_inkass]);

        return $dataProvider;
    }
}
