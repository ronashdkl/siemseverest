<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\SalarySlip */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Vouchers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>


<div class="container-fluid">
    <a class="btn btn-success" href="report?id=<?= $model->id;?>&action=print" target="_blank">Generate PDF</a>
    <div class="box">
        <table class="table table-bordered">
            <tbody>
            <tr>
                <td class="col text-center" colspan="3" rowspan="2"><h5><b>SIEMS EVEREST CONSULTANCY</b><h5></td>
                <td class="col text-center" colspan="6"><b><h2>SALARY SLIP</h2></b></td>
                <td class="col text-center" colspan="3" rowspan="2"><h5>Changunarayan-2,Bhaktapur,Nepal</h5></td>
            </tr>
            <tr>
                <td class="col text-center" colspan="6"><?= date("M d , Y", strtotime($model->date))  ?></td>
            </tr>
            <tr>
                <td colspan="3">Employee Name : <br/><br/> Designation   :</td>
                <td colspan="9"><?= $model->paidTo->fullName ?><br/><br/> <?= $model->paidTo->jobPost?> </td>

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
                <td colspan="3" rowspan="4">Payment Date: <br/><br/>Approved By </td>
                <td colspan="3" rowspan="4"><?= date("M d , Y", strtotime($model->date)) ?></td>
                <td colspan="6"><b>NET PAY</b></td>
            </tr>
            <tr>
                <td colspan="6" class="center"><b><?= $model->amount - $model->tax_amount?></b></td>
            </tr>
            <?php ?>
            </tbody>
        </table>
    </div>
</div>




