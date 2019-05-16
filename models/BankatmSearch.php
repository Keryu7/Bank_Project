<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Bankatm;

/**
 * BankatmSearch represents the model behind the search form of `app\models\Bankatm`.
 */
class BankatmSearch extends Bankatm
{
    /**
     * {@inheritdoc}
     */


    public function attributes()
    {
        // делаем поле зависимости доступным для поиска
        return array_merge(parent::attributes(), ['address.region']);
    }



    public function rules()
    {
        return [
            [['id_atm', 'id_model', 'id_address'], 'integer'],
            [['address.region'], 'safe']
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
        $query = Bankatm::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);


        //$query->joinWith(['address' => function($query) { $query->from(['address' => 'bankatm']); }]);
// добавляем сортировку по колонке из зависимости
        $dataProvider->sort->attributes['address.region'] = [
            'asc' => ['address.region' => SORT_ASC],
            'desc' => ['address.region' => SORT_DESC],
        ];




        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id_atm' => $this->id_atm,
            'id_model' => $this->id_model,
            'id_address' => $this->id_address,
        ])->andFilterWhere(['LIKE', 'address.region', $this->getAttribute('address.region')]);;


        return $dataProvider;
    }
}
