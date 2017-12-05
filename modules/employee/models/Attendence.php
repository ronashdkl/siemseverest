<?php

namespace app\modules\employee\models;

use Yii;

/**
 * This is the model class for table "attendence".
 *
 * @property integer $id
 * @property string $date
 * @property string $attendence
 * @property integer $status
 */
class Attendence extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'attendence';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['date','required'],
            [['date'], 'safe','unique'],
            [['status'], 'integer'],
            [['attendence'], 'string', 'max' => 255],
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
            'attendence' => 'Attendence',
            'status' => 'Status',
        ];
    }
}
