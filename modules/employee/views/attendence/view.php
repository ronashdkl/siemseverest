<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\switchinput\SwitchInput;
use app\modules\account\models\Employee;

/* @var $this yii\web\View */
/* @var $model app\modules\employee\models\Attendence */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Attendences', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="attendence-view">

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
            'date'
        ],
    ]) ?>

    <?php
    $employees = json_decode($model->attendence);
    foreach ($employees as $employee){
        $rows = (new \yii\db\Query())
            ->select(['id', 'first_name','last_name'])
            ->from('employee')
            ->where(['id' => $employee->employee_id])
            ->limit(1)
            ->all();
        //var_dump($rows);exit;
        echo $rows[0]["first_name"].' '.$rows[0]["last_name"];
        echo SwitchInput::widget([
            'name' => 'status_3',
            'value'=> $employee->value,
            'disabled' => true
        ]);
    }
    ?>

</div>
