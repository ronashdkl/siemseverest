<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\SalarySlip */

$this->title = 'Create Voucher';
$this->params['breadcrumbs'][] = ['label' => 'Vouchers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="voucher-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
