<?php

namespace app\modules\account\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\account\models\Income;

/**
 * IncomeSearch represents the model behind the search form about `app\modules\account\models\Income`.
 */
class IncomeSearch extends Income
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'amount'], 'integer'],
            [['source', 'date', 'received_by', 'description'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
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
        $query = Income::find();

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
            'amount' => $this->amount,
            'date' => $this->date,
        ]);

        $query->andFilterWhere(['like', 'source', $this->source])
            ->andFilterWhere(['like', 'received_by', $this->received_by])
            ->andFilterWhere(['like', 'description', $this->description]);

        return $dataProvider;
    }
}
