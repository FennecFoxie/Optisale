<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\ContactForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;

?>

<div class="site-contact">
    <h2 class='heading'>Связаться с нами</h2>


    <!--     <div class="row">
    <div class="col-lg-4 text-center">
        <h2>Адрес</h2>
    </div>
    <div class="col-lg-4 text-center">
        <h2>Телефоны</h2>
    </div>
    <div class="col-lg-4 text-center">
        <h2>E-mail</h2>
    </div>                
</div> -->


<div class="row">
    <div class="col-lg-6 col-lg-offset-3">
        <p>
            Если у вас есть идеи, предложения или вопросы, свяжитесь пожлауйста с нами, заполнив форму. Спасибо.
        </p>


        <?php $form = ActiveForm::begin(['id' => 'contact-form']); ?>

        <!-- <div class="row"> -->
            <?= $form->field($model, 'name')->textInput([
                'template' => '<div class="col-lg-4">{input}</div>',
                ])->label('Имя') ?>

            <?= $form->field($model, 'email')->textInput([
                'template' => '<div class="col-lg-4">{input}</div>',
                ])->label('Email') ?>

            <!-- </div> -->

            <?= $form->field($model, 'body')->textArea(['rows' => 6])->label('Сообщение') ?>

            <div class="form-group text-center">
                <?= Html::submitButton('Отправить', ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>
            </div>

            <?php ActiveForm::end(); ?>

        </div>
    </div>
</div>
