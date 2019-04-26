<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Bankatm */

$this->title = 'Create Bankatm';
$this->params['breadcrumbs'][] = ['label' => 'Bankatms', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bankatm-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
