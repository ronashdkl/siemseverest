<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\account\models\Withdraw */

$this->title = 'Create Withdraw';
$this->params['breadcrumbs'][] = ['label' => 'Withdraws', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="withdraw-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
