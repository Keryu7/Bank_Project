<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Soft */

$this->title = 'Create Soft';
$this->params['breadcrumbs'][] = ['label' => 'Softs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="soft-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
