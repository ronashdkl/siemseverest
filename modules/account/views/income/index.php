<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\account\models\IncomeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Incomes';
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
    <section class="col-lg-10 connectedSortable">
        <!-- TO DO List -->
        <div class="box box-primary">
            <!-- /.box-header -->
            <div class="box-body">
                <p class="col-3">
                    <?= Html::a('', ['create'], ['class' => 'btn btn-success pull-right fa fa-plus']) ?>
                </p>
                <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
                <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    'filterModel' => $searchModel,
                    'columns' => [
                        ['class' => 'yii\grid\SerialColumn'],
                        'amount',
                        'source',
                        'date',
                        'received_by',
                        // 'description:ntext',

                        ['class' => 'yii\grid\ActionColumn'],
                    ],
                ]); ?>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->

    </section>
</div>
