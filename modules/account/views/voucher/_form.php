<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\component\Helper;
use kartik\select2\Select2;
use kartik\date\DatePicker;
use yii\web\View;

/* @var $this yii\web\View */
/* @var $model app\models\Voucher */
/* @var $form yii\widgets\ActiveForm */
?>  <?php $form = ActiveForm::begin(); ?>
<div class="row">
    <div class="col-md-6">
        <div class="voucher-form">


            <?=
            $form->field($model, 'paid_to')->widget(Select2::classname(), [
                'data' => \yii\helpers\ArrayHelper::map(\app\modules\account\models\Employee::find()->all(), 'id', 'fullName'),
                'language' => 'en',
                'id'=>'paid_to',
                'options' => ['placeholder' => 'Select Employee'],
                'pluginOptions' => [
                    'allowClear' => true
                ]
            ]) ?>

            <?= $form->field($model, 'amount')->textInput(['id' => 'amount','readOnly'=>true]) ?>
            <?= $form->field($model, 'tax_amount')->textInput(['id' => 'tax_amount','readOnly'=>true]) ?>

            <?= $form->field($model, 'has_received')->dropDownList(['1' => 'Yes', '0' => 'No'],['prompt'=>'Select Option']); ?>
            <?= $form->field($model, 'information')->textInput(['id' => 'information']) ?>


            <?= $form->field($model, 'accountant')
                ->dropDownList(
                    \yii\helpers\ArrayHelper::map(\app\modules\account\models\Employee::find()->select(['id', 'first_name', 'last_name'])->where(['job_post' => Helper::ACCOUNTANT])->all(), 'id', 'fullName')
                ) ?>

            <?= $form->field($model, 'approved_by')
                ->dropDownList(
                    \yii\helpers\ArrayHelper::map(\app\modules\account\models\Employee::find()->select(['id', 'first_name', 'last_name'])->where(['job_post' => Helper::MANAGER])->all(), 'id', 'FullName')
                ) ?>


        </div>

    </div>
    <div class="col-md-6">
        <div class="row">
            <div class="col-sm-4" style="z-index: 99">
                <?=
                $form->field($model, 'date')->widget(DatePicker::classname(), [
                    'options' => ['placeholder' => 'Enter date ...'],
                    'type' => DatePicker::TYPE_INLINE,
                    'pluginOptions' => [
                        'autoclose' => true,
                        'todayHighlight' => true,
                        'todayBtn' => true,
                        'format' => 'yyyy-mm-dd'
                    ]
                ]);
                ?>
            </div>
            <div class="col-sm-8">
                <div id="avatar" class="pull-right">
                    <?php
                    if(!$model->isNewRecord){
                        echo "<img src='".$model->paidTo->image."' class=\"pull-right thumbnail\" style=\"width: 300px; height:300px; border: 1px;border-style: dashed;border-radius: 30px \"; ><br/>";
                        echo "<p class='text-center'>".$model->paidTo->job_post."</p>";
                    }
                    ?>
                </div>
            </div>
        </div>


        <br/>
        <br/>


    </div>
</div>
<div class="form-group">
    <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
</div>
<?php ActiveForm::end(); ?>
<?php
$script = <<< JS
$('#voucher-paid_to').on("select2:select", function(e) { 
    var id = $('#voucher-paid_to').select2('data')[0].id;
     $.ajax({
            url: 'receiver-information?id='+id,
            type: 'get',
             success: function (data) {
              var amount = jQuery.parseJSON(data);
              console.log("tax",amount);
              $('#avatar').empty();
             $('#avatar').append('<img src='+amount.avatar+' class="pull-right thumbnail" style="width: 300px; height:300px; border: 1px;border-style: dashed;border-radius: 30px "; >');
             $('#avatar').append('<p class=\'text-center\'>'+amount.job_post+'</p>');
             
             $('#amount').val(amount.payAmount); 
             $('#tax_amount').val(amount.taxAmount); 

           }

      });
});
JS;
$this->registerJs($script, View::POS_END); ?>
