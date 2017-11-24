<?php
/**
 * Created by PhpStorm.
 * User: rnsdk
 * Date: 10/31/2017
 * Time: 12:30 PM
 */

namespace app\component;
use Yii;
use yii\helpers\ArrayHelper;

class Helper
{
    CONST PAID = "PAID";
    const UNPAID = "UNPAID";
    const RECEIVED = "RECEIVED";

    const MANAGER = "Manager";
    const TEAMLEADER = "Team Leader";
    const PROGRAMMER = "Programmer";
    const ACCOUNTANT = "Accountant";
    const INTERNSHIP = "Internship";
    const OFFICEASSISTANCE = "Office Assistance";

    const TAX = 1;

    //table name income
    const INCOME ="incomes";
    //table name expense
    const EXPENSES = "expenses";
    //table for withdraw
    const WITHDRAW = "withdraw";

}