<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\web\View;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\account\models\ExpensesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Expenses';
$counter=1;
?>
<section class="content-header">
    <h1>
        <?= $this->title ;?>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"><?= $this->title;?></li>
    </ol>
</section>

<div class="container-fluid">
    <div class="no-padding no-margin box box-primary">
        <div class="box-header">
            <p class="col-3">
                <?= Html::a('', ['create'], ['class' => 'btn btn-success pull-right fa fa-plus']) ?>
            </p>
        </div>
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
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach($data as $each_data){?>
                    <tr>
                        <td scope="row"><?= $counter++?></th>
                        <td><?= $each_data->title?></td>
                        <td><?= $each_data->amount?></td>
                        <td><?= $each_data->description?></td>
                        <td><?= $each_data->date?></td>
                        <td class="center">
                            <?php if($each_data->status==1){ ?>
                                <span class='label label-success'>Related</span>
                            <?php }else{?>
                                <span class='label label-warning'>Irrelevent</span>
                            <?php } ?>
                        </td>
                        <td>
                            <ul class="list-unstyled">
                                <li style="display:inline-block">
                                    <a class=" btn btn-success btn-sm field-tip pointer" href="view?id=<?= $each_data->id ?>">
                                        <span class="fa fa-eye"></span>
                                    </a>
                                    <span class="tip-content" style="display: none;">View</span>
                                </li>
                                <li style="display:inline-block"  >
                                    <a class=" btn btn-danger btn-sm field-tip pointer" href="#">
                                        <span class="fa fa-trash-o"></span>
                                    </a>
                                    <span class="tip-content" style="display: none;">Delete</span>
                                </li>
                                <li style="display:inline-block"  >
                                    <a class=" btn btn-primary btn-sm field-tip pointer" href="update?id=<?= $each_data->id ?>">
                                        <span class="fa fa-edit"></span>
                                    </a>
                                    <span class="tip-content" style="display: none;">Edit</span>
                                </li>
                            </ul>
                        </td>
                    </tr>
                <?php }?>
                </tbody>
            </table>
        </div>
    </div>
</div>


<?php
$script = <<< JS
$(document).ready(function(){
    $('#expenses_table').DataTable({"aoColumnDefs": [{ 'bSortable': false, 'aTargets': [-1] }]});
});
JS;
$this->registerJs($script, View::POS_END); ?>












