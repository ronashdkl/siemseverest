<?php

namespace app\modules\account\models;

use Yii;

/**
 * This is the model class for table "tax".
 *
 * @property integer $id
 * @property integer $start_range
 * @property integer $end_range
 * @property double $tax_perc
 */
class Tax extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tax';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['start_range', 'end_range'], 'integer'],
            [['tax_perc'], 'number'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'start_range' => 'Start Range',
            'end_range' => 'End Range',
            'tax_perc' => 'Tax Perc',
        ];
    }
}
