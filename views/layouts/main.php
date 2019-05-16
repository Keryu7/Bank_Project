<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\widgets\Menu;
use yii\widgets\Breadcrumbs;
use yii\helpers\Html;
use yii\bootstrap4\Nav;
use yii\bootstrap4\NavBar;
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
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => '<div class="d-flex align-items-center"><img src="atm.jpg" style="display:inline; vertical-align: top; height:62px;"><p style="margin: 0 0 0 10px; font-size: 23px;">База банкоматов</p></div>',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar navbar-expand-lg navbar-dark bg-dark',
            'style'=>'font-size: 20px;',
        ],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'nav navbar-nav ml-auto align-items-center'],
        'items' => [
            /*['label' => 'Домой', 'url' => ['/bankatm/index']],*/
            ['label' => 'Регистрация', 'url' => ['/site/signup']],
            /*['label' => 'About', 'url' => ['/site/about']],
            ['label' => 'Contact', 'url' => ['/site/contact']],*/
            Yii::$app->user->isGuest ? (
                ['label' => 'Вход', 'url' => ['/site/login']]
            ) : (
                '<li>'
                . Html::beginForm(['/site/logout'], 'post')
                . Html::submitButton(
                    'Выйти (' . Yii::$app->user->identity->username . ')',
                    ['class' => 'btn btn-link logout',
                     'style' => 'font-size: 20px;']
                )
                . Html::endForm()
                . '</li>'
            )
        ],
    ]);
    NavBar::end();
    ?>

    <div class="container" style="padding-top: 0">
        <?php if (!Yii::$app->user->isGuest){
            NavBar::begin([
                'options' => [
                    'class' => 'navbar navbar-expand-lg navbar-dark bg-primary',
                    'style'=>'font-size: 20px;',
                ],
            ]);

        if (\Yii::$app->user->can('admin')) {
            echo Nav::widget([
                'options' => ['class' => 'nav navbar-nav ml-auto mr-auto align-items-center'],
                'items' => [
                    ['label' => 'Банкоматы', 'url' => ['bankatm/index']],
                    ['label' => 'Модели', 'url' => ['modelatm/index']],
                    ['label' => 'Софт', 'url' => ['soft/index']],
                    ['label' => 'Инкассация', 'url' => ['inkass/index']],
                    ['label' => 'Ремонт', 'url' => ['repair/index']],
                    ['label' => 'Адреса', 'url' => ['address/index']],
                    ['label' => 'Пользователи', 'url' => ['users/index']],

                ],
            ]);
        } else if (\Yii::$app->user->can('repair')) {
            echo Nav::widget([
            'options' => ['class' => 'nav navbar-nav ml-auto mr-auto align-items-center'],
            'items' => [
                ['label' => 'Главная', 'url' => ['bankatm/index']],
                ['label' => 'Модели', 'url' => ['modelatm/index']],
                ['label' => 'Софт', 'url' => ['soft/index']],
                ['label' => 'Ремонт', 'url' => ['repair/index']],
            ],
        ]);
        } else if (\Yii::$app->user->can('inkass')) {
            echo Nav::widget([
                'options' => ['class' => 'nav navbar-nav ml-auto mr-auto align-items-center'],
                'items' => [
                    ['label' => 'Главная', 'url' => ['bankatm/index']],
                    ['label' => 'Модели', 'url' => ['modelatm/index']],
                    ['label' => 'Инкассация', 'url' => ['inkass/index']],
                ],
            ]);
        }
            NavBar::end();}
            ?>

        <?= Breadcrumbs::widget([
            'itemTemplate' => "<li class=\"breadcrumb-item\">{link}</li>\n",
            'activeItemTemplate' => "<li class=\"breadcrumb-item active\" aria-current=\"page\">{link}</li>\n",
            'homeLink' => ['label' => 'Главная', 'url' => ['/bankatm/index']],
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="text-center">&copy; Juri Tsimanovich<?= date('Y') ?></p>

        <!--<p class="float-right"><?= Yii::powered() ?></p>-->
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
