<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Cart $model */

$this->title = 'Редактировать корзину';
$this->params['breadcrumbs'][] = ['label' => 'Корзина', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_cart, 'url' => ['view', 'id_cart' => $model->id_cart]];
$this->params['breadcrumbs'][] = 'Редактировать';
?>
<div class="cart-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
