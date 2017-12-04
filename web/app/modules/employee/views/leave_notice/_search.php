<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\employee\models\LeaveNoticeSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="leave-notice-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'employee_id') ?>

    <?= $form->field($model, 'apply_date') ?>

    <?= $form->field($model, 'start_date') ?>

    <?= $form->field($model, 'subject') ?>

    <?php // echo $form->field($model, 'description') ?>

    <?php // echo $form->field($model, 'leave_days') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'file') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
