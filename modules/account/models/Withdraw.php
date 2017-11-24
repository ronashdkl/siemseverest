<?php

namespace app\modules\account\models;

use Yii;

/**
 * This is the model class for table "withdraw".
 *
 * @property integer $id
 * @property string $title
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
            [['title', 'purpose'], 'string', 'max' => 25],
            [['received_by', 'description'], 'string', 'max' => 255],
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
            'received_by' => 'Received By',
            'description' => 'Description',
            'purpose' => 'Purpose',
            'status' => 'Status',
        ];
    }
}
