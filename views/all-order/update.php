<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\AllOrder $model */

$this->title = 'Редактировать заказ: ' . $model->id_order;
$this->params['breadcrumbs'][] = ['label' => 'Заказы', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_order, 'url' => ['view', 'id_order' => $model->id_order]];
$this->params['breadcrumbs'][] = 'Редактировать';
?>
<div class="all-order-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
