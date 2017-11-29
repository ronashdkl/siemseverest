<?php

namespace app\modules\account\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\account\models\Employee;

/**
 * EmployeeSearch represents the model behind the search form about `app\modules\account\models\Employee`.
 */
class EmployeeSearch extends Employee
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'user_id', 'status'], 'integer'],
            [['first_name', 'last_name', 'address', 'contact', 'job_type', 'job_post', 'citizenship_number', 'image'], 'safe'],
            [['sallery'], 'number'],
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
        $query = Employee::find();

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
            'user_id' => $this->user_id,
            'sallery' => $this->sallery,
            'status' => $this->status,
        ]);

        $query->andFilterWhere(['like', 'first_name', $this->first_name])
            ->andFilterWhere(['like', 'last_name', $this->last_name])
            ->andFilterWhere(['like', 'address', $this->address])
            ->andFilterWhere(['like', 'contact', $this->contact])
            ->andFilterWhere(['like', 'job_type', $this->job_type])
            ->andFilterWhere(['like', 'job_post', $this->job_post])
            ->andFilterWhere(['like', 'citizenship_number', $this->citizenship_number])
            ->andFilterWhere(['like', 'image', $this->image]);

        return $dataProvider;
    }
}
