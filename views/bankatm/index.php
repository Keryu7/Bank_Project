<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel app\models\BankatmSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Банкоматы';
$this->params['breadcrumbs'][] = $this->title;
?>
<?php Pjax::begin(); ?>
<div class="bankatm-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Добавить новый банкомат', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'summary' => "Показаны {begin} - {end} из {totalCount}",
        'pager' => [

            'class' => 'views\my\BootstrapLinkPager',

            //other pager config if nesessary

        ],
        'columns' => [
            /*['class' => 'yii\grid\SerialColumn'],*/

            'id_atm',
            /*'id_model',
            'id_address',*/
            [
                'attribute' => 'id_model',
                'value' => 'modelatm.model_name',
            ],
            [
                'attribute' => 'id_address',
                'value' => 'address.address',
            ],
            /*[
                    'attribute' => 'id_region',
                    'value' => 'address.region',
            ],*/
            'address.region',
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view}{update}{delete}',
                'buttons' => ['view' => function($url, $model) {
                    return Html::a('<span class="col-lg-4 btn btn-sm btn-default"><b class="fa fa-search-plus"></b></span>', ['view', 'id' => $model['id_atm']], ['title' => 'Просмотр', 'id' => 'modal-btn-view']);
                },
                    'update' => function($id, $model) {
                        return Html::a('<span class="col-lg-4 btn btn-sm btn-default"><b class="fa fa-pencil"></b></span>', ['update', 'id' => $model['id_atm']], ['title' => 'Изменить', 'id' => 'modal-btn-view']);
                    },
                    'delete' => function($url, $model) {
                        return Html::a('<span class="col-lg-4 btn btn-sm btn-danger"><b class="fa fa-trash"></b></span>', ['delete', 'id' => $model['id_atm']], ['title' => 'Удалить', 'class' => '', 'data' => ['confirm' => 'Вы абсолютно уверены? Вы потеряете все данные.', 'method' => 'post', 'data-pjax' => false],]);
                    }
                ]
            ],
        ],
    ]); ?>
</div>
<?php Pjax::end(); ?>
