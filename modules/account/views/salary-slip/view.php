<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\SalarySlip */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Vouchers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<a class="btn btn-success" href="report?action=print" target="_blank">Generate PDF</a>
<div class="box">
    <table class="table table-bordered">
        <tbody>
        <tr>
            <td colspan="3" rowspan="2"><h5><b>SIEMS EVEREST CONSULTANCY</b><h5></td>
            <td colspan="6"><h2>SALARY SLIP</h2></td>
            <td colspan="3" rowspan="2"><h5>Changunarayan-2,Bhaktapur,Nepal</h5></td>
        </tr>
        <tr>
            <td colspan="6"><?= $model->date ?></td>
        </tr>
        <tr>
            <td colspan="3">Employee Name : </td>
            <td colspan="9"><?= $model->paidTo->fullName ?> </td>
        </tr>
        <tr>
            <td colspan="3">Designation   : </td>
            <td colspan="9">Accountant </td>
        </tr>
        <tr>
            <td colspan="6"><b>Description</b></td>
            <td colspan="3"><b>Earning</b></td>
            <td colspan="3"><b>Deduction</b></td>
        </tr>
        <tr>
            <td colspan="6">Basic Salary</td>
            <td colspan="3"><?= $model->amount ?></td>
            <td colspan="3">-</td>
        </tr>
        <tr>
            <td colspan="6">Tax deduction</td>
            <td colspan="3">-</td>
            <td colspan="3"><?= $model->tax_amount ?></td>
        </tr>
        <tr>
            <td colspan="6">Total</td>
            <td colspan="3"><b><?= $model->amount ?></b></td>
            <td colspan="3"><b><?= $model->tax_amount ?></b></td>
        </tr>
        <tr>
            <td colspan="3" rowspan="2">Payment Date</td>
            <td colspan="3" rowspan="2">October 31,2017</td>
            <td colspan="6"><b>NET PAY</b></td>
        </tr>
        <tr>
            <td colspan="6" class="center"><b><?= $model->amount - $model->tax_amount?></b></td>
        </tr>
        <?php ?>
        <tr>
            <td rowspan="2"  colspan="12" class="center">Approved By </td>
        </tr>
        </tbody>
    </table>
</div>




