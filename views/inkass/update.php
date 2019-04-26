<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Inkass */

$this->title = 'Update Inkass: ' . $model->id_inkass;
$this->params['breadcrumbs'][] = ['label' => 'Inkasses', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_inkass, 'url' => ['view', 'id' => $model->id_inkass]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="inkass-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
