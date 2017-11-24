<?php

namespace app\modules\account\models;

use app\models\Balance;
use Yii;

/**
 * This is the model class for table "expenses".
 *
 * @property integer $id
 * @property string $title
 * @property integer $amount
 * @property string $date
 * @property string $description
 * @property integer $status
 */
class Expenses extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'expenses';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title','amount','date'],'required'],
            [['amount', 'status'], 'integer'],
            // validates if age is greater than or equal to 30
            ['amount', 'compare', 'compareValue' => $this->validateAmount(), 'operator' => '<=', 'type' => 'number'],
            [['date'], 'safe'],
            [['description'], 'string'],
            [['title'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'amount' => 'Amount',
            'date' => 'Date',
            'description' => 'Description',
            'status' => 'Status',
        ];
    }

    public function validateAmount()
    {
       $balance = Balance::find()->orderBy(['id' => SORT_DESC])->one();
        return  $balance['bank_amount'];
    }
}
