<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Address */

$this->title = 'Изменить адрес: ' . $model->id_address;
$this->params['breadcrumbs'][] = ['label' => 'Адреса', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_address, 'url' => ['view', 'id' => $model->id_address]];
$this->params['breadcrumbs'][] = 'изменить';
?>
<div class="address-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
