<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\switchinput\SwitchInput;
use kartik\date\DatePicker;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\modules\employee\models\Attendence */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="attendence-form">

    <?= Html::beginForm([
            ($model->isNewRecord) ? Url::toRoute('create') : Url::toRoute( 'update?id='.$model->id)], 'post') ?>
    <div class="col-md-5">
        <?php
        echo DatePicker::widget([
            'name' => 'date',
            'value'=>$model->date,
            'options' => ['placeholder' => 'Select start date ...'],
            'pluginOptions' => [
                'format' => 'yyyy-m-dd',
                'autoclose'=>true,
            ]
        ]);
        ?>
    </div>

    <div class="col col-3">
        <?php foreach ($employees as $employee) {
            $rows = (new \yii\db\Query())
                ->select(['id', 'first_name','last_name'])
                ->from('employee')
                ->where(['id' =>(!$model->isNewRecord)? $employee->employee_id : $employee->id])
                ->limit(1)
                ->all();
            echo $rows[0]["first_name"].' '.$rows[0]["last_name"];
            //var_dump($employee->employee_id);exit;
            echo SwitchInput::widget([
                'name' => (!$model->isNewRecord)? $employee->employee_id : $employee->id,
                'value'=>($model->isNewRecord)?true : $employee->value,
                'inlineLabel' => true
            ]);
        }?>
    </div>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php Html::endForm() ?>

</div>
