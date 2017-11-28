<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;
use app\component\Helper;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $model app\modules\account\models\Income */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="container-fluid">
    <section class="connectedSortable">
        <div class="box-body">
            <?php $form = ActiveForm::begin([
                    'action' => $model->isNewRecord ? Url::toRoute('/account/income/create') : Url::toRoute('/account/income/update?id='.$id)
            ]); ?>

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

