<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\employee\models\LeaveNotice */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Leave Notices', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="leave-notice-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'employee_id',
            'apply_date',
            'start_date',
            'subject:ntext',
            'description:ntext',
            'leave_days',
            'status',
            'file:ntext',
        ],
    ]) ?>

</div>
