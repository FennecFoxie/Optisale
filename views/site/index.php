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
     NavBar::begin([
        // 'brandLabel' => 'Optisale',
        // 'brandUrl' => Yii::$app->homeUrl,
        'options' => [
        'class' => 'navbar',
        ],
        ]);

     echo Html::img('images/logo.png', ['alt'=>'some', 'class'=>'text-center']).'<br>';

     echo Nav::widget([
        'options' => ['class' => 'navbar-nav'],
        'items' => [
        ['label' => 'Главная', 'url' => ['#index']],
        ['label' => 'О проекте', 'url' => ['#about']],
        ['label' => 'Подбор ассортимента', 'url' => ['#counts']],
        ['label' => 'Связяться с нами', 'url' => ['#contact']],
        ],
        ]);
     NavBar::end();
     ?>


     <h1 class='graphic-text'>От хорошего - к великому</h1>

     <p class="lead">Оптимизация вашей прибыли</p>

     <!-- <p><a class="btn btn-lg btn-success" href="site/counts">Узнать сейчас</a></p> -->

 </div>

 <div class="body-content">

    <!-- begin about -->
    <?= $this->render('_about') ?>
    <!-- end about -->


    <!-- BEGIN counts form -->
    <?= $this->render('_counts', [
        'model' => $modelCount,
        ]) ?>
        <!-- END counts form-->

        <!-- BEGIN contact form -->
        <?= $this->render('_contact', [
            'model' => $modelContact,
            ]) ?>
            <!-- END contact form-->

        </div>

        <!-- Скрипт для инициализации элементов на странице, имеющих атрибут data-toggle="tooltip" -->
        <script>
            // после загрузки страницы
            $(function () {
  // инициализировать все элементы на страницы, имеющих атрибут data-toggle="tooltip", как компоненты tooltip
  $('[data-toggle="tooltip"]').tooltip()
})
</script>