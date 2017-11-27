<?php

namespace app\modules\account\models;

use Yii;

/**
 * This is the model class for table "voucher".
 *
 * @property integer $id
 * @property integer $amount
 * @property string $date
 * @property string $paid_to
 * @property string $account_of
 * @property integer $accountant
 * @property integer $approved_by
 * @property string $information
 *
 * @property Employee $accountant0
 * @property Employee $approvedBy
 */
class Voucher extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'voucher';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['amount', 'accountant', 'approved_by'], 'integer'],
            [['date'], 'safe'],
            [['paid_to', 'account_of', 'information'], 'string'],
            [['accountant'], 'exist', 'skipOnError' => true, 'targetClass' => Employee::className(), 'targetAttribute' => ['accountant' => 'user_id']],
            [['approved_by'], 'exist', 'skipOnError' => true, 'targetClass' => Employee::className(), 'targetAttribute' => ['approved_by' => 'user_id']],
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
            'paid_to' => 'Paid To',
            'account_of' => 'Account Of',
            'accountant' => 'Accountant',
            'approved_by' => 'Approved By',
            'information' => 'Information',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAccountant0()
    {
        return $this->hasOne(Employee::className(), ['user_id' => 'accountant']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getApprovedBy()
    {
        return $this->hasOne(Employee::className(), ['user_id' => 'approved_by']);
    }
}
