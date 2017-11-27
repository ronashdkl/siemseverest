<?php
/**
 * Created by PhpStorm.
 * User: USER
 * Date: 27/11/2017
 * Time: 4:27 PM
 */

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use app\component\Helper;
use app\modules\account\models\Voucher;

$model = new Voucher();
?>


<div class="container-fluid">
    <section class="connectedSortable">
        <div class="box-body">

            <?php $form = ActiveForm::begin([
                'action' => $model->isNewRecord ? Url::toRoute('/account/expenses/create-voucher') : Url::toRoute('/account/withdraw/update-voucher?id='.$id)
            ]); ?>
            
            <?= $form->field($model, 'accountant')
                ->dropDownList(
                    \yii\helpers\ArrayHelper::map(\app\modules\account\models\Employee::find()->select(['id', 'first_name', 'last_name'])->where(['job_post' => Helper::ACCOUNTANT])->all(), 'id', 'fullName')
                ) ?>

            <?= $form->field($model, 'approved_by')
                ->dropDownList(
                    \yii\helpers\ArrayHelper::map(\app\modules\account\models\Employee::find()->select(['id', 'first_name', 'last_name'])->where(['job_post' => Helper::MANAGER])->all(), 'id', 'FullName')
                ) ?>

            <div class="form-group">
                <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
            </div>
            
            <?php ActiveForm::end(); ?>
        </div>
        <!-- /.box-body -->
    </section>
</div>
