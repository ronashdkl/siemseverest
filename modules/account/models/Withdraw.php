<?php

namespace app\modules\account\models;

use Yii;

/**
 * This is the model class for table "withdraw".
 *
 * @property integer $id
 * @property integer $amount
 * @property string $date
 * @property string $received_by
 * @property string $description
 * @property string $purpose
 * @property integer $status
 */
class Withdraw extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'withdraw';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['amount', 'status'], 'integer'],
            [['date'], 'safe'],
            [['received_by', 'description'], 'string', 'max' => 255],
            [['purpose'], 'string', 'max' => 25],
            [['amount','date','received_by','purpose'],'required']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'amount' => 'Amount',
            'date' => 'Date',
            'received_by' => 'Received By',
            'description' => 'Description',
            'purpose' => 'Purpose',
            'status' => 'Status',
        ];
    }
}
