<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "salary-slip".
 *
 * @property integer $id
 * @property string $date
 * @property double $amount
 * @property integer $paid_to
 * @property string $account_of
 * @property string $has_received
 * @property integer $accountant
 * @property integer $approved_by
 * @property string $information
 * @property string $tax_amount
 * @property User $accountant0
 * @property User $approvedBy
 * @property User $paidTo
 */
class SalarySlip extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'salary_slip';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['date', 'amount', 'paid_to', 'account_of', 'has_received', 'accountant', 'approved_by','information'], 'required'],
          // [['date'], 'date', 'format' => 'php:yyyy-mm-dd'],
            [['date'], 'safe'],
            [['amount','tax_amount'], 'number'],
            [['paid_to', 'accountant', 'approved_by'], 'integer'],
            [[ 'account_of'], 'string', 'max' => 200],
            [['has_received'], 'string', 'max' => 100],
            [['accountant'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['accountant' => 'id']],
            [['approved_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['approved_by' => 'id']],
            [['paid_to'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['paid_to' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'date' => 'Date',
            'amount' => 'Amount',
            'tax_amount'=>'Tax Amount',
            'paid_to' => 'Paid To',
            'account_of' => 'Account Of',
            'has_received' => 'Has Received',
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
        return $this->hasOne(\app\modules\account\models\Employee::className(), ['id' => 'accountant']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getApprovedBy()
    {
        return $this->hasOne(\app\modules\account\models\Employee::className(), ['id' => 'approved_by']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPaidTo()
    {
        return $this->hasOne(\app\modules\account\models\Employee::className(), ['id' => 'paid_to']);
    }

    public function delete()
    {
        return false;
    }


    /**
     * @inheritdoc
     * @return \app\models\activeQuery\VoucherQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\activeQuery\VoucherQuery(get_called_class());
    }
}
