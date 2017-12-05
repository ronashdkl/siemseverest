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
<style>
    .list-unstyled{
        list-style-type: none;
    }

    .list-unstyled li {
        display:inline;
    }
</style>
<div class="attendence-form">

    <?= Html::beginForm([
        ($model->isNewRecord) ? Url::toRoute('create') : Url::toRoute( 'update?id='.$model->id)], 'post') ?>
    <div class="col-md-12">
        <?php
        echo DatePicker::widget([
            'name' => 'date',
            'value'=>($model->isNewRecord)? date('Y-m-d') : $model->date,
            'readonly'=>true,
            'pluginOptions' => [
                'format' => 'yyyy-m-dd',
                'autoclose'=>true,
            ]
        ]);
        ?>
    </div>

    <div class="col col-m-12">
        <ul class="list-unstyle">

            <?php foreach ($employees as $employee) {?>
                <li class="display-inline" >
                <?php
                $rows = (new \yii\db\Query())
                    ->select(['id', 'first_name','last_name'])
                    ->from('employee')
                    ->where(['id' =>(!$model->isNewRecord)? $employee->employee_id : $employee->id])
                    ->limit(1)
                    ->all();
                echo $rows[0]["first_name"].' '.$rows[0]["last_name"];
                echo SwitchInput::widget([
                    'name' => (!$model->isNewRecord)? $employee->employee_id : $employee->id,
                    'value'=>($model->isNewRecord)?true : $employee->value,
                    'inlineLabel' => true
                ]);?>
                </li><?php  }?>

        </ul>
    </div>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php Html::endForm() ?>

</div>
