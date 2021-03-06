<?php

namespace app\modules\account\models;

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
 * @property integer $email
 * @property integer $joined_date
 *
 * @property Withdraw[] $withdraws
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
            [['first_name', 'last_name', 'address', 'contact','email','joined_date', 'job_type', 'job_post', 'sallery', 'citizenship_number', 'image', 'status'], 'required'],
            [['user_id', 'status'], 'integer'],
            [['sallery'], 'number'],
            [['joined_date'], 'date','format'=>'php:Y-m-d'],
            [['image'], 'string'],
            [['email'], 'email'],
            [['email'], 'unique'],
            //[['image'], 'safe'],
            [['first_name', 'last_name'], 'string', 'max' => 100],
            [['address', 'job_type', 'job_post', 'citizenship_number'], 'string', 'max' => 200],
            [['contact'], 'string', 'max' => 20],
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
            'joined_date' => 'Joined Date',
            'email' => 'Email',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWithdraws()
    {
        return $this->hasMany(Withdraw::className(), ['received_by' => 'id']);
    }
    public function getfullName(){
        return $this->first_name.' '.$this->last_name;
    }
    public function getJobPost(){
        return $this->job_post;
    }
}
