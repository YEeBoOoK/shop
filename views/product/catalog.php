<?php

use app\models\Product;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\bootstrap5;
use yii\bootstrap5\Dropdown;

/** @var yii\web\View $this */
/** @var app\models\ProductSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */
?>

<?php
/* @var $this yii\web\View */
/* @var $searchModel app\models\ProductSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
$this->title = 'Каталог товаров';
$this->params['breadcrumbs'][] = $this->title;
echo "<h1 style='color: #2a5674'>Каталог товаров</h1>

<div class='btn-group'>
  <button type='button' class='btn dropdown-toggle mb-2 text-light' style='background-color: #4f90a6' data-bs-toggle='dropdown' data-bs-auto-close='true' aria-expanded='false'>
    Страна поставщик
  </button>
  <ul class='dropdown-menu'>
    <li><a class='dropdown-item' href='/product/catalog/?sort=country_of_origin'>По алфавиту (А-Я)</a></li>
    <li><a class='dropdown-item' href='/product/catalog/?sort=-country_of_origin'>По убыванию (Я-А)</a></li>
  </ul>
</div>

<div class='btn-group'>  
  <button type='button' class='btn dropdown-toggle mb-2 text-light' style='background-color: #4f90a6' data-bs-toggle='dropdown' aria-expanded='false'>
    Наименование
  </button>
  <ul class='dropdown-menu'>
    <li><a class='dropdown-item' href='/product/catalog/?sort=name'>По алфавиту (А-Я)</a></li>
    <li><a class='dropdown-item' href='/product/catalog/?sort=-name'>От Я до А</a></li>
  </ul>
</div>

<div class='btn-group'>
  <button type='button' class='btn dropdown-toggle mb-2 text-light' style='background-color: #4f90a6' data-bs-toggle='dropdown' aria-expanded='false'>
    Цена
  </button>
  <ul class='dropdown-menu'>
    <li><a class='dropdown-item' href='/product/catalog/?sort=price'>По возрастанию</a></li>
    <li><a class='dropdown-item' href='/product/catalog/?sort=-price'>По убыванию</a></li>
  </ul>
</div>

<div class='btn-group'>
  <button type='button' class='btn dropdown-toggle mb-2 text-light' style='background-color: #4f90a6' data-bs-toggle='dropdown' aria-expanded='false'>
    Категория
  </button>
  <ul class='dropdown-menu'>
    <li><a class='dropdown-item' href='/product/catalog?sort=-id_product'>Все</a></li>
    <li><a class='dropdown-item' href='/product/catalog/?ProductSearch[category_id]=1'>Цветы</a></li>
    <li><a class='dropdown-item' href='/product/catalog/?ProductSearch[category_id]=2'>Упаковка</a></li>
    <li><a class='dropdown-item' href='/product/catalog/?ProductSearch[category_id]=3'>Дополнительно</a></li>
  </ul>
</div>
<!--Поместите здесь элементы управления каталогом в соответсвии с заданием-->
";

$products=$dataProvider->getModels();
echo "<div class='d-flex flex-row flex-wrap justify-content-start'>";
foreach ($products as $product){
    if ($product->left_product>0) {
        echo
        "<div class='card' style='min-width: 300px; max-width: 23%; margin: 0px 10px 10px 0px;'>
    <a href='/product/view?id_product={$product->id_product}'><img src='{$product->image}' class='card-img-top mx-auto' style='height: 100%; min-width: 298px; min-height: 299px; overflow: hidden;' alt='Product photo'></a>
    <div class='card-body'>
      <h5 class='card-title'>{$product->name}</h5>
      <p class='card-text'>{$product->country_of_origin}</p>
      <p class='text-danger'>{$product->price} руб</p>
    </div> 
    <div class='card-body'>";

        echo
        (Yii::$app->user->isGuest ?
            "<a href='/product/view?id_product={$product->id_product}'class='btn text-light' style='background-color: #3b738f'>Просмотр товара</a>"
            :
            "<p onclick='add_product({$product->id_product},1)' class='btn text-light' style='background-color: #3b738f'>Добавить в корзину</p>");
echo "</div>
</div>";}
}
echo "</div>";

?>