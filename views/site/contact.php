<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */
/** @var app\models\ContactForm $model */

use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;
use yii\captcha\Captcha;

$this->title = 'Где нас найти?';
$this->params['breadcrumbs'][] = $this->title;
?>
 <div class="site-contact">
    <h1 style='color: #2a5674;'><?= Html::encode($this->title) ?></h1>
     <h5 style='font-weight: normal; color: #2a5674;'>
         Наш магазин располагается по адресу:
         Коломяжский проспект, 24Б
     </h5>
     <div class="mb-4" style="max-height: 620px; min-width: 300px; width: 100%; overflow: hidden;">
         <img src='/web/SiteImage/map.png' alt='map' style='width: 100%; background: no-repeat;'/>
     </div>

     <h4 class="text-center m-3" style='color: #2a5674;'>
         Контактные данные
     </h4>

     <div class="container">
         <div class="row">
             <div class="col text-center">
                 <h6 style='color: #2a5674;'>Адрес</h6>
                 <p>Коломяжский проспект, 24Б</p>
             </div>
             <div class="col text-center">
                 <h6 style='color: #2a5674;'>Номер телефона</h6>
                 <p>+7 (911) 911-91-91</p>
             </div>
             <div class="col text-center">
                 <h6 style='color: #2a5674;'>Email</h6>
                 <p>flowersworld@gmail.com</p>
             </div>
         </div>
     </div>

 </div>


<!--
    <?php if (Yii::$app->session->hasFlash('contactFormSubmitted')): ?>

        <div class="alert alert-success">
            Благодарим вас за то, что вы обратились к нам. Мы ответим вам как можно скорее.
        </div>

        <p>
            Note that if you turn on the Yii debugger, you should be able
            to view the mail message on the mail panel of the debugger.
            <?php if (Yii::$app->mailer->useFileTransport): ?>
                Because the application is in development mode, the email is not sent but saved as
                a file under <code><?= Yii::getAlias(Yii::$app->mailer->fileTransportPath) ?></code>.
                Please configure the <code>useFileTransport</code> property of the <code>mail</code>
                application component to be false to enable email sending.
            <?php endif; ?>
        </p>

    <?php else: ?>

        <p>
            Если у вас есть деловые запросы или другие вопросы, пожалуйста, заполните следующую форму, чтобы связаться с нами.
            Спасибо!
        </p>

        <div class="row">
            <div class="col-lg-5">

                <?php $form = ActiveForm::begin(['id' => 'contact-form']); ?>

                    <?= $form->field($model, 'name')->textInput(['autofocus' => true]) ?>

                    <?= $form->field($model, 'email') ?>

                    <?= $form->field($model, 'subject') ?>

                    <?= $form->field($model, 'body')->textarea(['rows' => 6]) ?>

                    <?= $form->field($model, 'verifyCode')->widget(Captcha::class, [
                        'template' => '<div class="row"><div class="col-lg-3">{image}</div><div class="col-lg-6">{input}</div></div>',
                    ]) ?>

                    <div class="form-group">
                        <?= Html::submitButton('Отправить', ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>
                    </div>

                <?php ActiveForm::end(); ?>

            </div>
        </div>

    <?php endif; ?>-->

