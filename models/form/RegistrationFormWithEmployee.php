<?php

/**
 * Created by PhpStorm.
 * User: rnsdk
 * Date: 11/1/2017
 * Time: 10:01 AM
 */

namespace app\models\form;


use app\models\Employee;
use webvimark\modules\UserManagement\models\forms\RegistrationForm;
use webvimark\modules\UserManagement\models\User;
use webvimark\modules\UserManagement\UserManagementModule;
use yii\helpers\ArrayHelper;
use Yii;

class RegistrationFormWithEmployee extends RegistrationForm
{

    public $user_id;
    public $first_name;
    public $last_name;
    public $address;
    public $contact;
    public $job_type;
    public $job_post;
    public $salary;
    public $citizenship_number;
    public $image;
    public $status;


    public function rules()
    {
        return ArrayHelper::merge(parent::rules(), [
            [['user_id', 'first_name', 'last_name', 'address', 'contact', 'job_type', 'job_post', 'sallery', 'citizenship_number', 'image', 'status'], 'required'],
            [['user_id', 'status'], 'integer'],
            [['sallery'], 'number'],
            [['image'], 'string'],
            [['first_name', 'last_name'], 'string', 'max' => 100],
            [['address', 'job_type', 'job_post', 'citizenship_number'], 'string', 'max' => 200],
            [['contact'], 'string', 'max' => 20],
        ]);
    }

    public function saveProfile($user)
    {
            $emp = new Employee();
            $emp->user_id = $user->id;
            $emp->first_name = $this->first_name;
            $emp->last_name = $this->last_name;
            $emp->address = $this->address;
            $emp->contact = $this->contact;
            $emp->job_post = $this->job_post;
            $emp->job_type = $this->job_type;
            $emp->sallery = $this->salary;
            $emp->citizenship_number = $this->citizenship_number;
            $emp->image = $this->image;
            $emp->status = 1;
            $emp->save(false);
    }
}