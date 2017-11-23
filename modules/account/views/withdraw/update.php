<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\account\models\Withdraw */

$this->title = 'Update Withdraw: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Withdraws', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="withdraw-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
