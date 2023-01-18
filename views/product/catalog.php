<?php

use app\models\Product;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\ProductSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Каталог товаров';
$this->params['breadcrumbs'][] = $this->title;
echo "<h1>Каталог товаров</h1>
<!--Поместите здесь элементы управления каталогом в соответсвии с заданием-->
";

$products=$dataProvider->getModels();
echo "<div class='d-flex flex-row flex-wrap justify-content-start'>";
foreach ($products as $product){
    if ($product->left_product>0) {
        echo
        "<div class='card-group'>
    <div class='card m-1 flex-row flex-wrap' style='width: 22%; min-width: 300px; max-width: 22%;'>
    <img src='{$product->image}' class='card-img-top' style='max-height: 300px;' alt='Flower photo'>
    <div class='card-body'>
      <h5 class='card-title'>{$product->name}</h5>
      <p class='card-text'>{$product->description}</p>
      <p class='text-danger'>{$product->price} руб</p>
    </div>
    <div class='card-body text-center'>";

        echo (Yii::$app->user->isGuest ?
            "<a href='/product/view?id_product={$product->id_product}'class='btn btn-primary'>Просмотр товара</a>":
            "<p onclick='add_product({$product->id_product})' class='btn btn-primary'>Добавить в корзину</p>");
echo "</div>
</div>";}
}
echo "</div>
</div>";
?>

<div class="product-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Добавить товар', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_product',
            'image',
            'name',
            'price',
            'country_of_origin',
            //'category_id',
            //'color',
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
