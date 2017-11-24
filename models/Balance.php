<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "balance".
 *
 * @property integer $id
 * @property integer $bank_amount
 * @property integer $cash_amount
 * @property string $ref_id
 */
class Balance extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'balance';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['bank_amount', 'cash_amount'], 'integer'],
            [['ref_id'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'bank_amount' => 'Bank Amount',
            'cash_amount' => 'Cash Amount',
            'ref_id' => 'Ref ID',
        ];
    }
    public function getTotalBalance(){
        return $this->bank_amount+$this->cash_amount;
    }
    public function getfullName(){
        return $this->first_name.' '.$this->last_name;
    }
}
