<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\file\FileInput;
use kartik\date\DatePicker;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use app\modules\account\models\Employee;

/* @var $this yii\web\View */
/* @var $model app\modules\employee\models\LeaveNotice */
/* @var $form yii\widgets\ActiveForm */
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
        <div class="box-body">

            <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>


            <?=  $form->field($model, 'employee_id')->widget(Select2::classname(), [
                'data' => ArrayHelper::map(Employee::find()->all(),'user_id','first_name','last_name'),
                'options' => ['placeholder' => 'Select your name ...'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ]);
            ?>

            <?= $form->field($model, 'start_date')->widget(DatePicker::classname(), [
                'options' => ['placeholder' => 'Enter start date ...'],
                'pluginOptions' => [
                    'autoclose'=>true,
                    'format' => 'yyyy-m-dd'
                ]
            ]);?>

            <?= $form->field($model, 'subject')->textarea(['rows' => 6]) ?>

            <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

            <?= $form->field($model, 'leave_days')->textInput() ?>

            <?= $form->field($model, 'status')->hiddenInput(['value'=>1])->label(false); ?>

            <?= $form->field($model, 'file',['enableAjaxValidation' => false])->widget(FileInput::classname(), [
                'pluginOptions'=>['allowedFileExtensions'=>['txt','pdf','doc','jpg'],'showUpload' => false,],
            ]);   ?>


            <div class="form-group">
                <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
            </div>

            <?php ActiveForm::end(); ?>


        </div>
        <!-- /.box-body -->
    </div>
</div>
