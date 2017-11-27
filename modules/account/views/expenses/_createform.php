<?php
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;
use app\models\Employee;
use app\component\Helper;
use yii\bootstrap\Dropdown;
/**
 * Created by PhpStorm.
 * User: Binay
 * Date: 27/11/2017
 * Time: 12:18
 */
?>
<div class="container-fluid">
    <section class="connectedSortable">
        <div class="box-body">

            <?php $form = ActiveForm::begin([
                'action'=>'create'
            ]); ?>
<?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'amount') ?>

<?= $form->field($model, 'method')->dropDownList(Helper::METHOD) ?>

<?php echo $form->field($model, 'date')->widget(DatePicker::classname(), [
    'options' => ['placeholder' => 'Enter birth date ...'],
    'pluginOptions' => [
        'autoclose'=>true,
        'format' => 'yyyy-m-dd'
    ]
]);
?>

<?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

<?= $form->field($model, 'status')->hiddenInput(['value'=>1])->label(false); ?>
<div class="form-group">
    <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
</div>

<?php ActiveForm::end(); ?>
</div>
<!-- /.box-body -->
</section>
</div>
