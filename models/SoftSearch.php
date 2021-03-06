<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Soft;

/**
 * SoftSearch represents the model behind the search form of `app\models\Soft`.
 */
class SoftSearch extends Soft
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_soft'], 'integer'],
            [['soft_name'], 'safe'],
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
        $query = Soft::find();

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
            'id_soft' => $this->id_soft,
        ]);

        $query->andFilterWhere(['like', 'soft_name', $this->soft_name]);

        return $dataProvider;
    }
}
