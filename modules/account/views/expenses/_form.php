<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;
use app\models\Employee;
use app\component\Helper;
use yii\bootstrap\Dropdown;
use kartik\select2\Select2;
use yii\web\View;
/* @var $this yii\web\View */
/* @var $model app\models\Expenses */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="container-fluid">
    <section class="connectedSortable">
        <div class="box-body">

            <?php $form = ActiveForm::begin([
                    'action'=> ($model->isNewRecord)?'create':'update?id='.$model->id,
                    'enableClientValidation' => false,
                    'enableAjaxValidation' => true]); ?>
            <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>


            <?= $form->field($model, 'method')->widget(Select2::classname(), [
                'data' => Helper::METHOD,
                'language' => 'en',
                'id'=>'expense_method',
                'options' => ['placeholder' => 'Select method of payment'],
                'pluginOptions' => [
                    'allowClear' => true
                ]
            ]) ?>
            <label id="ajax_amount" class="hidden"></label>
            <?= $form->field($model, 'amount') ?>

            <?= $form->field($model, 'date')->widget(DatePicker::classname(), [
                'options' => ['placeholder' => 'Enter date ...'],
                'pluginOptions' => [
                    'autoclose'=>true,
                    'format' => 'yyyy-m-dd'
                ]
            ]);
            ?>
            <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>
            <?= $form->field($model, 'paid_to')->textInput() ?>
            <?= $form->field($model, 'bill_no')->textInput() ?>

            <?= $form->field($model, 'status')->hiddenInput(['value'=>1])->label(false); ?>
            <div class="form-group">
                <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
        <!-- /.box-body -->
    </section>
</div>
<?php
$script = <<< JS
$('#expenses-method').on("select2:select", function(e) { 
    var method = $('#expenses-method').val();
    var str_tot_amount = "Total amount: ";
     $.ajax({
            url: 'method-validate?id='+method,
            type: 'get',
             success: function (data) {
             $('#ajax_amount').removeClass("hidden");
             $('#ajax_amount').addClass("visible");
             $("#ajax_amount").html(data);
           }

      });
});
JS;
$this->registerJs($script, View::POS_END); ?>
