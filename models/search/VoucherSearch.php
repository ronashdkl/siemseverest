<?php

namespace app\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Voucher as VoucherModel;

/**
 * Voucher represents the model behind the search form about `app\models\Voucher`.
 */
class VoucherSearch extends VoucherModel
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'paid_to', 'accountant', 'approved_by'], 'integer'],
            [['date',  'account_of', 'has_received'], 'safe'],
            [['amount'], 'number'],
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
        $query = VoucherModel::find();

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
            'date' => $this->date,
            'amount' => $this->amount,
            'paid_to' => $this->paid_to,
            'accountant' => $this->accountant,
            'approved_by' => $this->approved_by,
        ]);

        $query->andFilterWhere(['like', 'account_of', $this->account_of])
            ->andFilterWhere(['like', 'has_received', $this->has_received]);

        return $dataProvider;
    }
}
