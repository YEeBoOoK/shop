<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Product $model */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Каталог', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="product-view">

    <h1><?= Html::encode($this->title) ?></h1>

<!--   ЭТО В ПРИНЦИПЕ И УДАЛИТЬ МОЖНО, НО ЙУХ С НИМ, ПУСТЬ БУДЕТ ПОКА

    <p>
        <?= Html::a('Update', ['update', 'id_product' => $model->id_product], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id_product' => $model->id_product], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>
-->

    <?= DetailView::widget([
        'model' => $model,

        'attributes' => [
            //'id_product',
            //'image',
            ['attribute'=>'Фото', 'format'=>'html', 'value'=>function($data){return"<img src='{$data->image}' alt='photo' style='width: 100%; min-width: 150px; max-width: 350px;'>";}],
            'name',
            'price',
            'country_of_origin',
            ['attribute'=>'Категория', 'value'=> function($data){return $data->getCategory()->One()->name_category;}],
            'color',
            'description',
            // ТОЖЕ МОЖНО И РАСКОМЕНТИТЬ, НО ПУСТЬ ПАКА ТАКЬ
            //'left_product',
        ],
    ]) ?>

    <p>
        <?=
        (Yii::$app->user->isGuest
            ?
            "<a href=''</a>"
            :
            "<p onclick='add_product({$model->id_product},1)' class='btn text-light w-100' style='background-color: #3b738f'>Добавить в корзину</p>");
        ?>
    </p>




</div>
