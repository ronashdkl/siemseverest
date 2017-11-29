<?php
/**
 * Created by PhpStorm.
 * User: USER
 * Date: 28/11/2017
 * Time: 1:42 PM
 */
use kartik\date\DatePicker;
use yii\web\View;
use yii\helpers\Html;
$counter=1;
?>
    <div class="container-fluid">
    <div class="col-md-12">
        <?= Html::beginForm(['salary-slip/tax'], 'post') ?>
        <div class="col-md-5">
            <?php
            echo DatePicker::widget([
                'name' => 'start_date',
                'value' => $start_date,
                'options' => ['placeholder' => 'Select start date ...'],
                'pluginOptions' => [
                    'format' => 'yyyy-m-dd',
                    'autoclose'=>true,
                ]
            ]);
            ?>
        </div>
        <div class="col-md-5">
            <?php
            echo DatePicker::widget([
                'name' => 'end_date',
                'value' => $end_date,
                'options' => ['placeholder' => 'Select end date ...'],
                'pluginOptions' => [
                    'format' => 'yyyy-m-dd',
                    'autoclose'=>true,
                ]
            ]);
            ?>
        </div>
        <div class="form-group col-md-2">
            <?= Html::submitButton('Go', ['class' => 'btn btn-primary']) ?>
        </div>
        <?php Html::endForm() ?>
    </div>
    <div class="col-md-12">
        <h3>Total Tax Amount : <?= $total_tax?></h3>
    </div>
    <div class="box">
        <div class="box-body">
            <table id="expenses_table" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>S.No.</th>
                    <th>Date</th>
                    <th>Total tax</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach($salary_slips as $salary_slip){?>
                    <tr>
                        <td scope="row"><?= $counter++?></td>
                        <td scope="row"><?= date('Y M', strtotime($salary_slip["date"]))?></td>
                        <td scope="row"><?= $salary_slip["tax_amount"]?></td>
                        <td>
                            <ul class="list-unstyled">
                                <li style="display:inline-block">
                                    <a class=" btn btn-success btn-sm field-tip pointer" href="tax-details?d=<?= $salary_slip["date"]?>">
                                        <span class="fa fa-eye"></span>
                                    </a>
                                    <span class="tip-content" style="display: none;">View</span>
                                </li>
                            </ul>
                        </td>
                    </tr>
                <?php }?>
                </tbody>
            </table>
        </div>
    </div>
<?php
$script = <<< JS
$(document).ready(function(){
});
JS;
$this->registerJs($script, View::POS_END); ?>