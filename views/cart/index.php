<?php

use app\models\Cart;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\CartSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Корзина';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cart-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id_cart',
            ['attribute'=>'Фото', 'format'=>'html', 'value'=>function($data){return"<img src='{$data->getProduct()->One()->image}' alt='photo' style='width: 100%; min-width: 150px; max-width: 250px;'>";}],
            ['attribute'=>'Товар', 'value'=> function($data){return $data->getProduct()->One()->name;}],
            ['attribute'=>'Описание', 'value'=> function($data){return $data->getProduct()->One()->description;}],
            ['attribute'=>'Цена за единицу', 'value'=> function($data){return $data->getProduct()->One()->price.' руб.';}],
            //'product_id',
            //'user_id',
            'count',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Cart $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id_cart' => $model->id_cart]);
                 }
            ],
        ],
    ]); ?>


    <div class="form-group mt-3">
        <a href="../all-order/create" class="btn btn-success">Оформить заказ</a>
    </div>

</div>
