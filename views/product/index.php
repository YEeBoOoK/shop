<?php

use app\models\Product;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\ProductSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

//$this->title = 'Каталог товаров';
$this->params['breadcrumbs'][] = $this->title;
echo "<h1>Каталог товаров</h1>"
?>
<div class="product-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Добавить продукт', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id_product',
            //'image',
            'name',
            'price',
            'country_of_origin',
            //'category_id',
            //'color',
            ['attribute'=>'Категория', 'value'=> function($data){return $data->getCategory()->One()->name_category;}],
            'name',
            ['attribute'=>'Фото', 'format'=>'html', 'value'=>function($data){return"<img src='{$data->image}' alt='photo' style='width: 70px;'>";}],

            'description',
            //'left_product',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Product $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id_product' => $model->id_product]);
                 }
            ],
        ],
    ]); ?>


</div>
