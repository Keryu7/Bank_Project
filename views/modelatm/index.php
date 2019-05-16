<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ModelatmSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Модели банкоматов';
$this->params['breadcrumbs'][] = $this->title;
?>
<?php Pjax::begin(); ?>
<div class="modelatm-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Добавить новую модель', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'summary' => "Показаны {begin} - {end} из {totalCount}",
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],

            'id_model',
            'model_name',
            //'id_soft',
            [
                'attribute' => 'id_soft',
                'value' => 'soft.soft_name',
            ],
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view}{update}{delete}',
                'buttons' => ['view' => function($url, $model) {
                    return Html::a('<span class="col-lg-4 btn btn-sm btn-default"><b class="fa fa-search-plus"></b></span>', ['view', 'id' => $model['id_model']], ['title' => 'Просмотр', 'id' => 'modal-btn-view']);
                },
                    'update' => function($id, $model) {
                        return Html::a('<span class="col-lg-5 btn btn-sm btn-default"><b class="fa fa-pencil"></b></span>', ['update', 'id' => $model['id_model']], ['title' => 'Изменить', 'id' => 'modal-btn-view']);
                    },
                    'delete' => function($url, $model) {
                        return Html::a('<span class="col-lg-3 btn btn-sm btn-danger"><b class="fa fa-trash"></b></span>', ['delete', 'id' => $model['id_model']], ['title' => 'Удалить', 'class' => '', 'data' => ['confirm' => 'Вы абсолютно уверены? Вы потеряете все данные.', 'method' => 'post', 'data-pjax' => false],]);
                    }
                ]
            ],
        ],
    ]); ?>
</div>
<?php Pjax::end(); ?>
