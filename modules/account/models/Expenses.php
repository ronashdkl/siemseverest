<?php

namespace app\modules\account\models;

use app\models\Balance;
use function foo\func;
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
            [['title','amount','date','method','paid_to'],'required'],
            [['amount', 'status'], 'integer'],
            // validates if age is greater than or equal to 30
            ['amount', 'validateAmount', 'when' => function($model){
            if($model->method !=""){
                return true;
            }else{
                return false;
            }
            }],
            [['date'], 'safe'],
            [['description','method','paid_to','bill_no'], 'string'],
            [['title'],'match','pattern'=>'/^[a-z]\w*$/i'],
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
            'paid_to' => 'Paid To',
            'bill_no' => 'Bill No',
            'status' => 'Status',
        ];
    }
public function validateTitle($attribute,$params,$validator){
        $title = $this->title;
        if(! preg_match([A-Za-z],$title)){
            $this->addError('title',"Title must be attribute");
        }
}
    public function validateAmount($attribute,$params,$validator)
    {
        $balance = Balance::find()->orderBy(['id' => SORT_DESC])->one();
        $method = $this->method;
        if($method=="cash"){
            if($this->amount > $balance['cash_amount'])
            $this->addError('amount',"Expense must be less than cash amount");
        }else{
            if($this->amount > $balance['bank_amount'])
                $this->addError('amount',"Expense must be less than Bank amount");
        }
    }
}
