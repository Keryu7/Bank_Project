<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\RepairSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Ремонт';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="repair-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Добавить ремонт', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'summary' => "Показаны {begin} - {end} из {totalCount}",
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],

            //'id_repair',
            'id_atm',
            'repair',
            'date_repair',
            [
                'attribute' => 'id_user',
                'value' => 'user.lastname',
            ],

            //['class' => 'yii\grid\ActionColumn'],
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view}{update}{delete}',
                'buttons' => ['view' => function($url, $model) {
                    return Html::a('<span class="col-lg-4 btn btn-sm btn-default"><b class="fa fa-search-plus"></b></span>', ['view', 'id' => $model['id_repair']], ['title' => 'Просмотр', 'id' => 'modal-btn-view']);
                },
                    'update' => function($id, $model) {
                        return Html::a('<span class="col-lg-4 btn btn-sm btn-default"><b class="fa fa-pencil"></b></span>', ['update', 'id' => $model['id_repair']], ['title' => 'Изменить', 'id' => 'modal-btn-view']);
                    },
                    'delete' => function($url, $model) {
                        return Html::a('<span class="col-lg-4 btn btn-sm btn-danger"><b class="fa fa-trash"></b></span>', ['delete', 'id' => $model['id_repair']], ['title' => 'Удалить', 'class' => '', 'data' => ['confirm' => 'Вы абсолютно уверены? Вы потеряете все данные.', 'method' => 'post', 'data-pjax' => false],]);
                    }
                ]
            ],
        ],
    ]); ?>


</div>
