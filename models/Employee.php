<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "employee".
 *
 * @property integer $id
 * @property integer $user_id
 * @property string $first_name
 * @property string $last_name
 * @property string $address
 * @property string $contact
 * @property string $job_type
 * @property string $job_post
 * @property double $sallery
 * @property string $citizenship_number
 * @property string $image
 * @property integer $status
 * @property string $fullName
 *
 * @property User $user
 */
class Employee extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'employee';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'first_name', 'last_name', 'address', 'contact', 'job_type', 'job_post', 'sallery', 'citizenship_number', 'image', 'status'], 'required'],
            [['user_id', 'status'], 'integer'],
            [['sallery'], 'number'],
            [['image'], 'string'],
            [['first_name', 'last_name'], 'string', 'max' => 100],
            [['address', 'job_type', 'job_post', 'citizenship_number'], 'string', 'max' => 200],
            [['contact'], 'string', 'max' => 20],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'first_name' => 'First Name',
            'last_name' => 'Last Name',
            'address' => 'Address',
            'contact' => 'Contact',
            'job_type' => 'Job Type',
            'job_post' => 'Job Post',
            'sallery' => 'Sallery',
            'citizenship_number' => 'Citizenship Number',
            'image' => 'Image',
            'status' => 'Status',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    public function getFullName(){
        return $this->first_name." ".$this->last_name;
    }
    /**
     * @inheritdoc
     * @return \app\models\activeQuery\EmployeeQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\activeQuery\EmployeeQuery(get_called_class());
    }
}
