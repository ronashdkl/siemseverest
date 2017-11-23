<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\account\models\Income */

$this->title = 'Create Income';
$this->params['breadcrumbs'][] = ['label' => 'Incomes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="income-create">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
