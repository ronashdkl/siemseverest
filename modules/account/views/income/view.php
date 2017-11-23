<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\account\models\Income */

$this->title = $model->source;
$this->params['breadcrumbs'][] = ['label' => 'Incomes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <?= $this->title ;?>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active"><<?= $this->title;?></li>
        </ol>
    </section>
    <section class="col col-10">
        <!--body start-->
        <div class="box box-primary">
            <div class="box-body">
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
                        'amount',
                        'source',
                        'date',
                        'received_by',
                        'description:ntext',
                    ],
                ]) ?>
            </div>
        </div>
        <!--body start-->
    </section>
</div>
