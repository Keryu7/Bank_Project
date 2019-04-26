<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Inkass */

$this->title = 'Create Inkass';
$this->params['breadcrumbs'][] = ['label' => 'Inkasses', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="inkass-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
