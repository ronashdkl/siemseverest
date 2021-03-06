<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Employee */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Employees', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
    <div class="col-md-6">
        <div class="employee-view">

            <h1><?= Html::encode(ucfirst($model->first_name." ".$model->last_name)) ?></h1>

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

                    'first_name',
                    'last_name',
                    'address',
                    'contact',
                    'job_type',
                    'job_post',
                    'sallery',
                    'citizenship_number',

                    'status',
                ],
            ]) ?>

        </div>

    </div>
    <div class="col-md-6">
        <h1>Avatar</h1>
     <br/><br/>

        <img src="<?= $model->image?>" style="width: 80%;"/>
    </div>
</div>
