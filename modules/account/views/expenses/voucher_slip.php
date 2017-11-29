<?php
/**
 * Created by PhpStorm.
 * User: USER
 * Date: 28/11/2017
 * Time: 11:04 AM
 */

use yii\helpers\Html;

$this->title = 'Vouchers Slip';
?>

<section class="content-header" xmlns="http://www.w3.org/1999/html">
    <h1>
        <?= $this->title ;?>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"><?= $this->title;?></li>
    </ol>
</section>

<div class="container-fluid">

    <div class="box">

        <div class="col-sm-12" style="background-color: #fba5a5;">
            <h3 class="text-center text-capitalize"><b style="text-transform: uppercase;font-stretch: expanded;">Siems
                    Everest Consultancy</b><br/>
                <span style="font-size: small">Changunarayan-2, Bhaktapur</span>
                <br/>

            </h3>
            <h4 class="text-center"><u><b style="text-transform: uppercase">Voucher</b></u></h4>

            <strong class="pull-left">V.No:<span><?= $model->id?></span></strong>
            <strong class="pull-right">Date:<span><?= $model->date?></span></strong>
            <br/>
            <br/>
            <br/>
            <table class="table table-responsive">
                <tr>
                    <th>
                        Paid Rs.
                    </th>
                    <td>
                        <u><?= $model->amount ?></u>
                    </td>
                    <th>
                        to Mr./Mrs./Ms
                    </th>
                    <td>
                        <u> <?= $model->paid_to ?></u>
                    </td>
                </tr>
                <tr>
                    <th>
                        on account of
                    </th>
                    <td>
                        <u><?= $model->information ?></u>
                    </td>
                </tr>
            </table>
            <br/>
            <br/>
            <br/>

            <table class="table">
                <tr>
                    <th>
                        Received By: <?= $model->paid_to ?>
                    </th>
                    <th>
                        Accountant: <?= $model->accountant0->fullName ?>
                    </th>
                    <th>
                        Approved By: <?= $model->approvedBy->fullName ?>
                    </th>
                </tr>
            </table>
        </div>
    </div>
</div>
