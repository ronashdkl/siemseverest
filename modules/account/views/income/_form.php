<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;
use app\component\Helper;
/* @var $this yii\web\View */
/* @var $model app\modules\account\models\Income */
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
        <!-- TO DO List -->
        <div class="box box-primary">
            <div class="box-body">
                <?php $form = ActiveForm::begin(); ?>

                <?= $form->field($model, 'source')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'amount')->textInput() ?>

                <?= $form->field($model, 'date')->widget(DatePicker::classname(), [
                    'options' => ['placeholder' => 'Enter date ...'],
                    'pluginOptions' => [
                        'autoclose'=>true,
                        'format' => 'yyyy-m-dd'
                    ]
                ]);
                ?>

                <?= $form->field($model, 'received_by')->dropDownList(
                    \yii\helpers\ArrayHelper::map(\app\modules\account\models\Employee::find()->select(['id', 'first_name', 'last_name'])->where(['job_post' => Helper::MANAGER])->all(), 'first_name', 'FullName')
                )  ?>

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

