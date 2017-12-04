<?php

use yii\helpers\Html;
use yii\web\View;
use yii\widgets\ActiveForm;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\EmployeeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Employees';
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
                <?= Html::a('Create Employee', ['create'], ['class' => 'btn btn-success']) ?>
            </p>
        </div>
        <div class="box-body">
            <table id="employee_table" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>S.No.</th>
                    <th>Name</th>
                    <th>Address</th>
                    <th>Job Post</th>
                    <th>Contact</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach($data as $each_data){?>
                    <tr>
                        <td scope="row"><?= $counter++?></th>
                        <td><?= $each_data->fullName?></td>
                        <td><?= $each_data->address?></td>
                        <td><?= $each_data->job_post?></td>
                        <td><?= $each_data->contact?></td>
                        <td>
                            <ul class="list-unstyled">
                                <li style="display:inline-block">
                                    <a class=" btn btn-success btn-sm field-tip pointer" href="view?id=<?= $each_data->id ?>">
                                        <span class="fa fa-eye"></span>
                                    </a>
                                    <span class="tip-content" style="display: none;">View</span>
                                </li>
                                <li style="display:inline-block"  >
                                    <button class="btn btn-danger btn-sm field-tip pointer" data-toggle="modal" data-target="#delete_Modal<?=$each_data->id?>">
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
                                        'action' => Url::toRoute('/employee/employeemanage/delete-employee'),

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
    $('#employee_table').DataTable({"aoColumnDefs": [{ 'bSortable': false, 'aTargets': [-1] }]});
});
JS;
$this->registerJs($script, View::POS_END); ?>