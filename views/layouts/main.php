<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => 'Siems Everest',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-default navbar-fixed-top',
        ],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => [
            (\app\models\User::hasRole('Manager',true)) ?
            [
                'label' => 'User Management',
                'items' => [
                    '<li>'.Html::a('Role',\yii\helpers\Url::toRoute('/user-management/role')).'</li>'
                    . '</li><li>'.Html::a('Permission',\yii\helpers\Url::toRoute('/user-management/permission')).'</li>'
                    . '</li><li>'.Html::a('Users',\yii\helpers\Url::toRoute('/user-management/user')).'</li>'
                    . '</li><li>'.Html::a('Visit Log',\yii\helpers\Url::toRoute('/user-management/user-visit-log')).'</li>'

                ],
            ]:
                ['label' => 'Home', 'url' => ['/site/index']],

                (Yii::$app->user->isGuest) ?
                ['label' => 'Login', 'url' => ['/dektrium-login/login']]



                    : (
                '<li>'
                . Html::beginForm(['/site/logout'], 'post')
                . Html::submitButton(
                    'Logout (' . Yii::$app->user->identity->username . ')',
                    ['class' => 'btn btn-link logout']
                )
                . Html::endForm().'</li>'
                //. '<li>'.Html::a('Email Confirm',\yii\helpers\Url::toRoute('/user-management/auth/confirm-email')).'</li>'


                ),

        ],
    ]);
    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
     <?= $content ?>

    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; Siems Everest <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
