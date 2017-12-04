<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\employee\models\LeaveNotice */

$this->title = 'Create Leave Notice';
$this->params['breadcrumbs'][] = ['label' => 'Leave Notices', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="leave-notice-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
