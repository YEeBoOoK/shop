<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\AllOrder $model */

$this->title = 'Create All Order';
$this->params['breadcrumbs'][] = ['label' => 'All Orders', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="all-order-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
