<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\web\View;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\account\models\ExpensesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Expenses';
?>
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        <?= $this->title ;?>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"><<?= $this->title;?></li>
    </ol>
</section>

<div class="no-padding no-margin box box-success">
    <div class="box-header">
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <table id="expenses_table" class="table table-bordered table-striped">
            <thead>
            <tr>
                <th>S.No.</th>
                <th>Title</th>
                <th>Amount</th>
                <th>Description</th>
                <th>Date</th>
                <th>Status</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>1</td>
                <td>first</td>
                <td>20000</td>
                <td>hfdgjs</td>
                <td>23/11/2017</td>
                <td>1</td>
            </tr>
            <tr>
                <td>1</td>
                <td>first</td>
                <td>20000</td>
                <td>hfdgjs</td>
                <td>23/11/2017</td>
                <td>1</td>
            </tr>
            <tr>
                <td>1</td>
                <td>first</td>
                <td>20000</td>
                <td>hfdgjs</td>
                <td>23/11/2017</td>
                <td>1</td>
            </tr>
            <tr>
                <td>1</td>
                <td>first</td>
                <td>20000</td>
                <td>hfdgjs</td>
                <td>23/11/2017</td>
                <td>1</td>
            </tr>
            <tr>
                <td>1</td>
                <td>first</td>
                <td>20000</td>
                <td>hfdgjs</td>
                <td>23/11/2017</td>
                <td>1</td>
            </tr>
            <tr>
                <td>1</td>
                <td>first</td>
                <td>20000</td>
                <td>hfdgjs</td>
                <td>23/11/2017</td>
                <td>1</td>
            </tr>
            <tr>
                <td>1</td>
                <td>first</td>
                <td>20000</td>
                <td>hfdgjs</td>
                <td>23/11/2017</td>
                <td>1</td>
            </tr>
            <tr>
                <td>1</td>
                <td>first</td>
                <td>20000</td>
                <td>hfdgjs</td>
                <td>23/11/2017</td>
                <td>1</td>
            </tr><tr>
                <td>1</td>
                <td>first</td>
                <td>20000</td>
                <td>hfdgjs</td>
                <td>23/11/2017</td>
                <td>1</td>
            </tr>
            <tr>
                <td>1</td>
                <td>first</td>
                <td>20000</td>
                <td>hfdgjs</td>
                <td>23/11/2017</td>
                <td>1</td>
            </tr>
            <tr>
                <td>1</td>
                <td>first</td>
                <td>20000</td>
                <td>hfdgjs</td>
                <td>23/11/2017</td>
                <td>1</td>
            </tr>
            <tr>
                <td>1</td>
                <td>first</td>
                <td>20000</td>
                <td>hfdgjs</td>
                <td>23/11/2017</td>
                <td>1</td>
            </tr>
            <tr>
                <td>1</td>
                <td>first</td>
                <td>20000</td>
                <td>hfdgjs</td>
                <td>23/11/2017</td>
                <td>1</td>
            </tr>

            </tbody>
        </table>
    </div>
    <!-- /.box-body -->
</div>


<?php
$script = <<< JS
$(document).ready(function(){
    $('#expenses_table').DataTable({"aoColumnDefs": [{ 'bSortable': false, 'aTargets': [-1] }]});
});
JS;
$this->registerJs($script, View::POS_END); ?>












