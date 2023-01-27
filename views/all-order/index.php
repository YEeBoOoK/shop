<?php

use app\models\AllOrder;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\AllOrderSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Заказы';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="all-order-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <!--<p>
        < (тут ?=) Html::a('Оформить заказ', ['create'], ['class' => 'btn btn-success']) ?>
    </p>-->

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id_order',
            ['attribute'=>'Фото', 'format'=>'html', 'value'=>function($data){return"<img src='{$data->getProduct()->One()->image}' alt='photo' style='width: 100%; min-width: 150px; max-width: 250px;'>";}],
            ['attribute'=>'Наименование', 'value'=> function($data){return $data->getProduct()->One()->name;}],
            //'product_id',
            'count',
            'status',
            'reason',
            //'time',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, AllOrder $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id_order' => $model->id_order]);
                 }
            ],
        ],
    ]); ?>


</div>
