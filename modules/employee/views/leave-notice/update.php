<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\employee\models\LeaveNotice */

$this->title = 'Update Leave Notice: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Leave Notices', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="leave-notice-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
