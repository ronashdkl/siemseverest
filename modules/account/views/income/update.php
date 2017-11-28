<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\account\models\Income */

$this->title = 'Update Income: ' . $model->source;
$this->params['breadcrumbs'][] = ['label' => 'Incomes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="income-update">
    <?= $this->render('_form', [
        'model' => $model,
        'id'=>$id
    ]) ?>

</div>
