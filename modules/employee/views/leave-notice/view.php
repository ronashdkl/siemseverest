<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\employee\models\LeaveNotice */

$this->title = $model->id;
?>
<section class="content-header">
    <h1>
        <?= $this->title ;?>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"><?= $this->title;?></li>
    </ol>
</section>

<div class="container-fluid">
    <div class="no-padding no-margin box box-primary">
        <div class="box-header">
            <p>
                <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
                <?= Html::a('Delete', ['delete', 'id' => $model->id], [
                    'class' => 'btn btn-danger',
                    'data' => [
                        'confirm' => 'Are you sure you want to delete this item?',
                        'method' => 'post',
                    ],
                ]) ?>
                <?php if($model->status!=2){?>
                <?= Html::a('Approve', ['approve', 'id' => $model->id], ['class' => 'btn btn-success pull-right']) ?>
                <?php }else{?>
                <i class="fa fa-check fa-lg pull-right">Approved</i>
            <?php }?>
            </p>
        </div>
    <div>
    <div class="box-body">
        <p>
            <?= $model->employee->getfullName()?>
            <br>
            <?= $model->employee->address?>
            <br>
            <br>
            <b><?= "Leave Date: &nbsp". date("Y-m-d",strtotime($model->start_date))."&nbsp To &nbsp".$end_date?></b>
            <br>
            <br>
            <b>Subject:&nbsp</b>
            <?= $model->subject?>
            <br>
            <br>
            <?= $model->description?>
            <br>
            <br>
            <b>Attachment:&nbsp</b>
            <?php if(!empty($model->file)){?>
                <?= Html::a($model->file,'../../'.$model->file, [
                    'target'=>'_blank'
                ]) ?>
            <?php } ?>
        </p>
    </div>

</div>
