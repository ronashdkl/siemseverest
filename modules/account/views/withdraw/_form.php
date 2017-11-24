<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;
use app\component\Helper;
use app\modules\account\models\Employee;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\modules\account\models\Withdraw */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="container-fluid">
    <section class="connectedSortable">
        <div class="box-body">
            <?php $form = ActiveForm::begin([
                'action' => 'create'
            ]); ?>

            <?= $form->field($model, 'amount')->textInput() ?>

            <?= $form->field($model, 'date')->widget(DatePicker::classname(), [
                'options' => ['placeholder' => 'Enter date ...'],
                'pluginOptions' => [
                    'autoclose'=>true,
                    'format' => 'yyyy-m-dd'
                ]
            ]);
            ?>
            <?php
            $employee = Employee::find()->all();
            $employee_array = ArrayHelper::map($employee, 'fullname', 'fullName');
            $employee_array["other"] = "other";
            ?>
            <label>Received by</label>
            <?php
            echo Html::dropDownList('s_id', null,$employee_array,
                [
                    'class'=>"form-control",
                    'onchange'=>'if($(this).val() == "other"){
                         $("#received_by").empty();
                         $("#received_by").removeClass("hidden"); 
                         }else{
                             var name = $(this).val();
                           $("#received_by").empty();
                           $("#received_by").val(name);
                          }'
                ]);

            echo $form->field($model, 'received_by')->textInput(['id'=>'received_by','class'=>'hidden form-control','value'=>reset($employee_array)])->label(false);
           ?>



            <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'purpose')->textInput(['maxlength' => true]) ?>

            <div class="form-group">
                <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
            </div>

            <?php ActiveForm::end(); ?>

        </div>
        <!-- /.box-body -->
    </section>
</div>
