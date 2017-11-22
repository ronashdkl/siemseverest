<?php

namespace app\modules\account\models;

use Yii;

/**
 * This is the model class for table "incomes".
 *
 * @property integer $id
 * @property integer $amount
 * @property string $source
 * @property string $date
 * @property string $received_by
 * @property string $description
 */
class Income extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'incomes';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['amount'], 'integer'],
            [['date'], 'safe'],
            [['description'], 'string'],
            [['source', 'received_by'], 'string', 'max' => 255],
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
            'source' => 'Source',
            'date' => 'Date',
            'received_by' => 'Received By',
            'description' => 'Description',
        ];
    }
}
