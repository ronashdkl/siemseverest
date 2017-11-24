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

<div class="withdraw-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true ,'id'=>'quantity']) ?>

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
    $employee_array = ArrayHelper::map($employee, 'id', 'fullName');
    array_push($employee_array,"other");
    ?>
    <?= Html::dropDownList('s_id', null,$employee_array,
        ['prompt'=>'-Choose a option-',
            'onchange'=>'if($(this).val() == '.count($employee_array).'){
                 $("#received_by").classList.remove("hidden"); }else{ }'
        ]) ?>


    <?= $form->field($model, 'received_by')->textInput(['id'=>'received_by','class'=>'hidden']);?>



    <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'purpose')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
