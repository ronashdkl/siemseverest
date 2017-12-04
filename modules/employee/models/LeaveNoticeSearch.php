<?php

namespace app\modules\employee\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\employee\models\LeaveNotice;

/**
 * LeaveNoticeSearch represents the model behind the search form about `app\modules\employee\models\LeaveNotice`.
 */
class LeaveNoticeSearch extends LeaveNotice
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'employee_id', 'leave_days', 'status'], 'integer'],
            [['apply_date', 'start_date', 'subject', 'description', 'file'], 'safe'],
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
        $query = LeaveNotice::find();

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
            'employee_id' => $this->employee_id,
            'apply_date' => $this->apply_date,
            'start_date' => $this->start_date,
            'leave_days' => $this->leave_days,
            'status' => $this->status,
        ]);

        $query->andFilterWhere(['like', 'subject', $this->subject])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'file', $this->file]);

        return $dataProvider;
    }
}
