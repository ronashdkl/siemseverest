<?php

namespace app\account\models;

use Yii;

/**
 * This is the model class for table "voucher".
 *
 * @property integer $id
 * @property integer $amount
 * @property string $date
 * @property string $paid_to
 * @property string $account_of
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
            [['amount'], 'integer'],
            [['date'], 'safe'],
            [['paid_to', 'account_of'], 'string'],
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
        ];
    }
}
