<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\widgets\ActiveForm;
use yii\bootstrap\Modal;
use yii\web\View;
/* @var $this yii\web\View */
/* @var $searchModel app\models\search\VoucherSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Vouchers';
$counter=1;
var_dump($data);exit;
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
            <table id="voucher_table" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>S.No.</th>
                    <th>Amount</th>
                    <th>Date</th>
                    <th>Paid To</th>
                    <th>Has Received</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach($data as $each_data){?>
                    <tr>
                        <td scope="row"><?= $counter++?></th>
                        <td><?= $each_data->amount?></td>
                        <td><?= $each_data->date?></td>
                        <td><?= $each_data->paid_to?></td>
                        <td><?= $each_data->has_received?></td>
                        <td>
                            <ul class="list-unstyled">
                                <li style="display:inline-block">
                                    <a class=" btn btn-success btn-sm field-tip pointer" href="view?id=<?= $each_data->id ?>">
                                        <span class="fa fa-eye"></span>
                                    </a>
                                    <span class="tip-content" style="display: none;">View</span>
                                </li>
                                <li style="display:inline-block"  >
                                    <button class="btn btn-danger btn-sm field-tip pointer delete_btn" data-content="<?= $each_data->id?>">
                                        <span class="fa fa-trash-o"></span>
                                    </button>
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

                    <!-- delete modal -->
                    <div class="modal fade" id="delete_Modal<?=$each_data->id?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title center" id="myModalLabel">Delete Expense</h4>
                                </div>
                                <div class="modal-body">
                                    <h5>Are you sure you want to delete this file?</h5>
                                    <?php $form=ActiveForm::begin([
                                        'action' => '#',

                                    ]);  ?>
                                    <?= Html::input('hidden', 'id',$each_data->id, ['class' => '']) ?>
                                    <?= Html::submitButton('Yes',['class' => 'btn btn-success',] ) ?>
                                    <?php ActiveForm::end(); ?>
                                    <?= Html::submitButton('No', ['class' => 'btn btn-danger','data-dismiss'=>"modal" ]) ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php }?>
                </tbody>
            </table>
        </div>
    </div>
</div>


<?php
$script = <<< JS
$(document).ready(function(){
    $('#voucher_table').DataTable({"aoColumnDefs": [{ 'bSortable': false, 'aTargets': [-1] }]});
    
$('.delete_btn').on('click',function(event){
    var id = $(this).attr("data-content");
    $('#delete_Modal'+id).modal('show');
    event.stopPropagation();
});
$('#createbtn').on('click',function(event){
    $('#createModal').modal('show');
    event.stopPropagation();
});
});
JS;
$this->registerJs($script, View::POS_END); ?>


