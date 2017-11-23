<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;
/* @var $this yii\web\View */
/* @var $model app\modules\account\models\Income */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="container">

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <?= $this->title ;?>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active"><<?= $this->title;?></li>
        </ol>
    </section>
    <section class="col-lg-10 connectedSortable">
        <!-- TO DO List -->
        <div class="box box-primary">
            <div class="box-body">
                <?php $form = ActiveForm::begin(); ?>

                <?= $form->field($model, 'amount')->textInput() ?>

                <?= $form->field($model, 'source')->textInput(['maxlength' => true]) ?>

                <label>Date</label>
                <?php //$form->field($model, 'date')->textInput()
                echo DatePicker::widget([
                    'model' => $model,
                    'attribute' => 'date',
                    'options' => ['placeholder' => 'Enter date ...'],
                    'pluginOptions' => [
                        'autoclose'=>true
                    ]
                ]);
                ?>

                <?= $form->field($model, 'received_by')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

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


<div class="income-form">

</div>
