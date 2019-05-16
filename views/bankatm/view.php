<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Bankatm */

$this->title = $model->id_atm;
$this->params['breadcrumbs'][] = ['label' => 'Банкоматы', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="bankatm-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Редактировать', ['update', 'id' => $model->id_atm], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id_atm], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы действительно хотите удалить?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_atm',
            //'id_model',
            //'id_address',
            [
                'attribute' => 'id_model',
                'value' => $model->modelatm->model_name,
            ],
            [
                'attribute' => 'id_address',
                'value' => $model->address->address,
            ],
        ],
    ]) ?>

</div>
