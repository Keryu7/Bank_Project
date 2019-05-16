<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Inkass */

$this->title = $model->id_inkass;
$this->params['breadcrumbs'][] = ['label' => 'Инкассации', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="inkass-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Редактировать', ['update', 'id' => $model->id_inkass], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id_inkass], [
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
            //'id_inkass',
            'id_atm',
            'amount_inkass',
            'date_inkass',

            //'id_user',
            [
                'attribute' => 'id_user',
                'value' => $model->user->lastname,
            ],
        ],
    ]) ?>

</div>
