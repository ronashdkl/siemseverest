<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\modules\employee\models\Jobpost;
use kartik\file\FileInput;
use kartik\date\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\Employee */
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

            <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data'],'enableAjaxValidation' => true]); ?>

            <?= $form->field($model, 'first_name')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'last_name')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'address')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'contact')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'email')->textInput() ?>

            <?= $form->field($model, 'joined_date')->widget(DatePicker::classname(), [
                'options' => ['placeholder' => 'Enter joined date ...'],
                'pluginOptions' => [
                    'autoclose'=>true,
                    'format' => 'yyyy-m-dd'
                ]
            ]);?>

            <?= $form->field($model, 'job_type')->dropDownList(['permanent' => 'permanent', 'provision' => 'provision', 'contract' => 'contract']); ?>

            <?= $form->field($model, 'job_post')->dropDownList(ArrayHelper::map(Jobpost::find()->all(),'id','job_post')); ?>

            <?= $form->field($model, 'sallery')->textInput() ?>

            <?= $form->field($model, 'citizenship_number')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'image',['enableAjaxValidation' => false])->widget(FileInput::classname(), [
                'options' => ['accept' => 'image/*'],
                'pluginOptions'=>['allowedFileExtensions'=>['jpg','gif','png'],'showUpload' => false,],
            ]);   ?>

            <?= $form->field($model, 'status')->hiddenInput(['value'=>1])->label(false); ?>

            <div class="form-group">
                <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
            </div>

            <?php ActiveForm::end(); ?>

        </div>
        <!-- /.box-body -->
    </div>
</div>
