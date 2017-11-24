<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;
use app\models\Employee;

/* @var $this yii\web\View */
/* @var $model app\models\Expenses */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="container-fluid">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <?= $this->title ;?>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active"><?= $this->title;?></li>
        </ol>
    </section>
    <section class="connectedSortable">
        <div class="box box-primary">
            <div class="box-body">

                <?php $form = ActiveForm::begin(); ?>
                <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'amount') ?>
                
                <?php echo $form->field($model, 'date')->widget(DatePicker::classname(), [
                    'options' => ['placeholder' => 'Enter birth date ...'],
                    'pluginOptions' => [
                        'autoclose'=>true,
                        'format' => 'yyyy-m-dd'
                    ]
                ]);
                ?>

                <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

                <?= $form->field($model, 'status')->hiddenInput(['value'=>1])->label(false); ?>
                <div class="form-group">
                    <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
                </div>

                <?php ActiveForm::end(); ?>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </section>
</div>
