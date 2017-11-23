<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;
use app\component\Helper;

/* @var $this yii\web\View */
/* @var $model app\modules\account\models\Withdraw */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="withdraw-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

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
        \yii\helpers\ArrayHelper::map(\app\modules\account\models\Employee::find()->select(['id', 'first_name', 'last_name'])->where(['job_post' => Helper::MANAGER])->all(), 'id', 'fullName')
    ) ?>

    <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'purpose')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
