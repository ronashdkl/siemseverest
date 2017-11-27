<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;
use app\component\Helper;
/**
 * Created by PhpStorm.
 * User: Binay
 * Date: 27/11/2017
 * Time: 12:20
 */

?>

<div class="container-fluid">
    <section class="connectedSortable">
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

            <?= $form->field($model, 'status')->hiddenInput(['value'=>1])->label(false) ?>

            <div class="form-group">
                <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
        <!-- /.box-body -->

    </section>
</div>


