<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\employee\models\Jobpost */

$this->title = 'Create Jobpost';
$this->params['breadcrumbs'][] = ['label' => 'Jobposts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="jobpost-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
