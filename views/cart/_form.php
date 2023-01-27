<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Cart $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="cart-form">

    <?php $form = ActiveForm::begin(); ?>

    <!--<(вопросительный знак и равно) $form->field($model, 'product_id')->textInput() ?>

    тут удалила строчку
    <(вопросительный знак и равно) $form->field($model, 'user_id')->textInput() ?> -->

    <?= $form->field($model, 'count')->textInput() ?>

    <div class="form-group mt-3">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
