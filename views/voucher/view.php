<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Voucher */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Vouchers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="voucher-view">

    <div class="row">

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
                       <u> <?= $model->paidTo->fullName ?></u>
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
                       Received By: <?= $model->paidTo->fullName ?>
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
<br/>
<br/>
<p>
    <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
    <?= Html::a('Delete', ['delete', 'id' => $model->id], [
        'class' => 'btn btn-danger',
        'data' => [
            'confirm' => 'Are you sure you want to delete this item?',
            'method' => 'post',
        ],
    ]) ?>
</p>

