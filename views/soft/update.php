<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Soft */

$this->title = 'Update Soft: ' . $model->id_soft;
$this->params['breadcrumbs'][] = ['label' => 'Softs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_soft, 'url' => ['view', 'id' => $model->id_soft]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="soft-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
