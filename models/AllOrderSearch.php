<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\AllOrder;

/**
 * AllOrderSearch represents the model behind the search form of `app\models\AllOrder`.
 */
class AllOrderSearch extends AllOrder
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_order', 'user_id', 'product_id', 'count'], 'integer'],
            [['reason', 'status', 'time'], 'safe'],
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
        $query = AllOrder::find();

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
            'id_order' => $this->id_order,
            'user_id' => $this->user_id,
            'product_id' => $this->product_id,
            'count' => $this->count,
            'time' => $this->time,
        ]);

        $query->andFilterWhere(['like', 'reason', $this->reason])
            ->andFilterWhere(['like', 'status', $this->status]);

        return $dataProvider;
    }
}
