<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <!-- <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script> -->
    <script src='tooltip.js' type="text/javascript"></script>
</head>
<body>
    <?php $this->beginBody() ?>

    <div class="wrap">
        <!-- <div class="container"> -->
        <?= $content ?>
        <!-- </div> -->
    </div>

    <footer class="footer sticky-footer">
        <div class="container">
            <p class="pull-left">&copy; OptiSale <?= date('Y') ?>. Все права защищены</p>

            
            
            
            <p class="pull-right  footer-object">optisale-info@gmail.com</p>
            <p class="pull-right  footer-object">210-81-15</p>
            <p class="pull-right  footer-object">ул. Коммунистическая 24, офис 6</p>
            <p class="pull-right footer-object">ООО "Оптисейл"</p>
            
            
        </div>
    </footer>


    <?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
