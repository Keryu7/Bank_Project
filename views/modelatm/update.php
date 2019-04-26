<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Modelatm */

$this->title = 'Update Modelatm: ' . $model->id_model;
$this->params['breadcrumbs'][] = ['label' => 'Modelatms', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_model, 'url' => ['view', 'id' => $model->id_model]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="modelatm-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
