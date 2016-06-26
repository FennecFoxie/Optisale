<?php
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
/* @var $this yii\web\View */

$this->title = 'OptiSale';
?>

<div class="site-index">

    <div class="jumbotron">

     <?php
     // NavBar::begin([
     //    // 'brandLabel' => 'Optisale',
     //    // 'brandUrl' => Yii::$app->homeUrl,
     //    'options' => [
     //    'class' => 'navbar',
     //    ],
     //    ]);

     echo Html::img('images/logo.png', ['alt'=>'some', 'class'=>'text-center']).'<br>';

     // echo Nav::widget([
     //    'options' => ['class' => 'navbar-nav'],
     //    'items' => [
     //    ['label' => 'Главная', 'url' => ['#']],
     //    ['label' => 'О проекте', 'url' => ['#']],
     //    ['label' => 'Подбор ассортимента', 'url' => ['/site/counts']],
     //    ['label' => 'Связяться с нами', 'url' => ['#contact']],
     //    ],
     //    ]);
     // NavBar::end();
     ?>
     <ul class='nav'>
         <!-- <li><a href='#main'>Главная</a></li> -->
         <li><a href='#about'>О проекте</a></li>
         <li><a href='#count'>Подбор ассортимента</a></li>
         <li><a href='#contact'>Связаться с нами</a></li>
     </ul>


     <h1 class='graphic-text'>От хорошего - к великому</h1>

     <p class="lead">Оптимизация вашей прибыли</p>

     <!-- <p><a class="btn btn-lg btn-success" href="site/counts">Узнать сейчас</a></p> -->

 </div>

 <div class="container">

     <div class="body-content">

        <div id="about"></div>
        <!-- begin about -->
        <?= $this->render('_about') ?>
        <!-- end about -->
    </div>

    <div id='count'>
        <!-- BEGIN counts form -->
        <?= $this->render('_counts', [
            'model' => $modelCount,
            ]) ?>
        </div>

        <!-- END counts form-->


        <div id="contact">
            <!-- BEGIN contact form -->
            <?= $this->render('_contact', [
                'model' => $modelContact,
                ]) ?>
                <!-- END contact form-->
            </div>
        </div>

    </div>
</div>


<!-- Скрипт для инициализации элементов на странице, имеющих атрибут data-toggle="tooltip" -->
<script>
            // после загрузки страницы
            $(function () {
  // инициализировать все элементы на страницы, имеющих атрибут data-toggle="tooltip", как компоненты tooltip
  
  $('[data-toggle="tooltip"]').tooltip();

})
</script>