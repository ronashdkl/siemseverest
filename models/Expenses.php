<?php

namespace app\models;

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
            [['title'], 'required'],
            [['amount', 'status'], 'integer'],
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
}
