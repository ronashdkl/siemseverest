<?php
/**
 * Created by PhpStorm.
 * User: USER
 * Date: 28/11/2017
 * Time: 1:42 PM
 */
use kartik\date\DatePicker;
use yii\web\View;
use yii\helpers\Html;
?>
<div class="container-fluid">
    <div class="col-md-12">
        <?= Html::beginForm(['salary-slip/tax'], 'post', ['enctype' => 'multipart/form-data']) ?>
        <div class="col-md-5">
            <?php
            echo DatePicker::widget([
                'name' => 'start_date',
                'value' => $start_date,
                'options' => ['placeholder' => 'Select start date ...'],
                'pluginOptions' => [
                    'format' => 'yyyy-m-dd',
                    'autoclose'=>true,
                ]
            ]);
            ?>
        </div>
        <div class="col-md-5">
            <?php
            echo DatePicker::widget([
                'name' => 'end_date',
                'value' => $end_date,
                'options' => ['placeholder' => 'Select end date ...'],
                'pluginOptions' => [
                    'format' => 'yyyy-m-dd',
                    'autoclose'=>true,
                ]
            ]);
            ?>
        </div>
        <div class="form-group col-md-2">
            <?= Html::submitButton('Go', ['class' => 'btn btn-primary']) ?>
        </div>
        <?php Html::endForm() ?>
    </div>
    <div class="col-md-12">
        <h3>Total Tax Amount : <?= $total_tax?></h3>

    </div>
</div>

<?php
$script = <<< JS
$(document).ready(function(){
});
JS;
$this->registerJs($script, View::POS_END); ?>