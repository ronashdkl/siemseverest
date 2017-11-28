<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\search\SalarySlipSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="voucher-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'date') ?>

    <?= $form->field($model, 'amount') ?>



    <?= $form->field($model, 'paid_to') ?>

    <?php // echo $form->field($model, 'account_of') ?>

    <?php // echo $form->field($model, 'has_received') ?>

    <?php // echo $form->field($model, 'accountant') ?>

    <?php // echo $form->field($model, 'approved_by') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
