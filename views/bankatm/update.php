<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Bankatm */

$this->title = 'Изменить Банкомат: ' . $model->id_atm;
$this->params['breadcrumbs'][] = ['label' => 'Банкомат', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_atm, 'url' => ['view', 'id' => $model->id_atm]];
$this->params['breadcrumbs'][] = 'Изменить';
?>
<div class="bankatm-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
