<?php
namespace app\models;
/**
 * Created by PhpStorm.
 * User: Binay
 * Date: 04/12/2017
 * Time: 12:50
 */
class AttendenceValue{
    public $employee_id;
    public $value;

    /**
     * @return mixed
     */
    public function getEmployeeId()
    {
        return $this->employee_id;
    }

    /**
     * @param mixed $employee_id
     */
    public function setEmployeeId($employee_id)
    {
        $this->employee_id = $employee_id;
    }

    /**
     * @return mixed
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @param mixed $value
     */
    public function setValue($value)
    {
        $this->value = $value;
    }

}