<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SoftSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Программное обеспечение';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="soft-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Добавить ПО', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'summary' => "Показаны {begin} - {end} из {totalCount}",
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],

            'id_soft',
            'soft_name',

            //['class' => 'yii\grid\ActionColumn'],
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view}{update}{delete}',
                'buttons' => ['view' => function($url, $model) {
                    return Html::a('<span class="col-lg-4 btn btn-sm btn-default"><b class="fa fa-search-plus"></b></span>', ['view', 'id' => $model['id_soft']], ['title' => 'Просмотр', 'id' => 'modal-btn-view']);
                },
                    'update' => function($id, $model) {
                        return Html::a('<span class="col-lg-4 btn btn-sm btn-default"><b class="fa fa-pencil"></b></span>', ['update', 'id' => $model['id_soft']], ['title' => 'Изменить', 'id' => 'modal-btn-view']);
                    },
                    'delete' => function($url, $model) {
                        return Html::a('<span class="col-lg-4 btn btn-sm btn-danger"><b class="fa fa-trash"></b></span>', ['delete', 'id' => $model['id_soft']], ['title' => 'Удалить', 'class' => '', 'data' => ['confirm' => 'Вы абсолютно уверены? Вы потеряете все данные.', 'method' => 'post', 'data-pjax' => false],]);
                    }
                ]
            ],
        ],
    ]); ?>


</div>
