<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Modelatm */

$this->title = 'Create Modelatm';
$this->params['breadcrumbs'][] = ['label' => 'Modelatms', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="modelatm-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
