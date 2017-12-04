<?php

namespace app\modules\employee\models;

use Yii;
use app\modules\account\models\Employee;

/**
 * This is the model class for table "leave_notice".
 *
 * @property integer $id
 * @property integer $employee_id
 * @property string $apply_date
 * @property string $start_date
 * @property string $subject
 * @property string $description
 * @property integer $leave_days
 * @property integer $status
 * @property string $file
 *
 * @property Employee $employee
 */
class LeaveNotice extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'leave_notice';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['employee_id', 'leave_days', 'apply_date','start_date','subject','description'], 'required'],
            [['employee_id', 'leave_days', 'status'], 'integer'],
            [['apply_date', 'start_date'], 'safe'],
            [['subject', 'description', 'file'], 'string'],
            [['employee_id'], 'exist', 'skipOnError' => true, 'targetClass' => Employee::className(), 'targetAttribute' => ['employee_id' => 'user_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'employee_id' => 'Employee ID',
            'apply_date' => 'Apply Date',
            'start_date' => 'Start Date',
            'subject' => 'Subject',
            'description' => 'Description',
            'leave_days' => 'Leave Days',
            'status' => 'Status',
            'file' => 'File',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEmployee()
    {
        return $this->hasOne(Employee::className(), ['user_id' => 'employee_id']);
    }
}
