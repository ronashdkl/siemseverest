<?php
/**
 * Created by PhpStorm.
 * User: USER
 * Date: 28/11/2017
 * Time: 1:42 PM
 */
use kartik\date\DatePicker;
use yii\web\View;
?>
<div class="container-fluid">
    <div class="col-md-12">
        <div class="col-md-6">
            <?php
            echo DatePicker::widget([
                'name' => 'start_date',
                'id' => 'start_date',
                'value' => date('d-M-Y'),
                'options' => ['placeholder' => 'Select issue date ...'],
                'pluginOptions' => [
                    'format' => 'dd-M-yyyy',
                    'todayHighlight' => true
                ]
            ]);
            ?>
        </div>
        <div class="col-md-6">
            <?php
            echo DatePicker::widget([
                'name' => 'end_date',
                'value' => date('d-M-Y'),
                'options' => ['placeholder' => 'Select issue date ...'],
                'pluginOptions' => [
                    'format' => 'dd-M-yyyy',
                    'todayHighlight' => true
                ]
            ]);
            ?>
        </div>
    </div>
</div>

<?php
$script = <<< JS
$(document).ready(function(){
    $('#start_date').datepicker()
    .on("input change", function (e) {
    //alert('#start_date'.val);
    alert("ok");
});
});
JS;
$this->registerJs($script, View::POS_END); ?>