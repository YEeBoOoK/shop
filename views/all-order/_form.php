<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\AllOrder $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="all-order-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'count')->textInput() ?>

    <?= $form->field($model, 'reason')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status')->dropDownList([ 'Новый' => 'Новый', 'Подтвержден' => 'Подтвержден', 'Отменён' => 'Отменён', ], ['prompt' => '']) ?>

    <div class="form-group mt-3">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
