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

<div class="expenses-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
    

    <?= $form->field($model, 'amount')->textInput() ?>

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

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
