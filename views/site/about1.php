<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use app\models\Products;

$this->title = 'Результаты';
?>

<style type="text/css">
	header {
		padding: 30px 0;
		background: url(images/bg-thin.png);
	}
/*	.navbar ul li a {
		color: #575656;
		border-top: 1px solid #575656;
	}
	.navbar ul li a:hover  {
		box-shadow: inset 0 3px 0 0 #575656;
		background: transparent;
	}*/
</style>

<div class="site-result">
	<header>
		<?php
		NavBar::begin([
			'options' => [
			'class' => 'navbar',
			],
			]);

		echo Html::img('images/logo.png', ['alt'=>'some', 'class'=>'text-center']).'<br>';

		echo Nav::widget([
			'options' => ['class' => 'navbar-nav'],
			'items' => [
			['label' => 'Вернуться на главную', 'url' => ['/site/index']],
			],
			]);
		NavBar::end();
		?>
	</header>

	<div class="container">

		<div class="body-content">
			<?php
			$productsAll = 
			[
			'6'=>'Свежие овощи и фрукты',
			'7'=>'Овощные и плодово-ягодные консервы', 
			'8'=>'Овощные и плодово-ягодные консервы для детского питания',
			'9'=>'Соления и квашения',
			'10'=>'Быстрозамороженная овощная и плодово-ягодная продукция'

			];
			$criteriaAll = [
			'1'=>'Органолептическая ценность',
			'2'=>'Доброкачественность и длительность хранения',
			'3'=>'Экологические свойства',
			'4'=>'Кулинарно-технологические свойства',
			'5'=>'Эргономические свойства',
			'6'=>'Химическая безопасность'
			];
			$marketsAll = [
			'1'=>'Рынки',
			'2'=>'Специализированные магазины',
			'3'=>'Супермаркеты',
			'4'=>'Рестораны и кафе'
			];
			?>

			<h3>Параметры запроса</h3>
			<div class="row">
				<div class="col-md-4">
					<h4>Категории товаров</h4>
					<ul>
						<?php
						for ($i=0; $i < count($products); $i++) { 
							echo '<li>'.$productsAll[$products[$i]].'</li>';
						}
						?>
					</ul>
				</div>
				<div class="col-md-4">
					<h4>Пользовательские критерии</h4>
					<ul>
						<?php
						for ($i=0; $i < count($criteria); $i++) { 
							echo '<li>'.$criteriaAll[$criteria[$i]].'</li>';
						}
						?>
					</ul>
				</div>
				<div class="col-md-4">
					<h4>Рынки сбыта</h4>
					<ul>
						<?php
						for ($i=0; $i < count($markets); $i++) { 
							echo '<li>'.$marketsAll[$markets[$i]].'</li>';
						}
						?>
					</ul>
				</div>
			</div>

			<div class="row">
				<div class="col-lg-12">
					<h3>Рекомендации</h3>
					В соответствии с выбранными вами критериями, рекомендуем вам использовать следующие товарные группы:
					<ul>
						<?php
						$result = [];
						for ($i=0; $i < count($products); $i++) { 
							$result[$i] = $productsAll[$products[$i]];
						}
						$length = count($result);
						if($length > 1)
							unset($result[count($result) - 2]);
						sort($result);
						for ($i=0; $i < count($result); $i++) { 
							echo '<li>'.$result[$i].'</li>';
						}
						?>
					</ul>

				</div>
			</div>
		</div>
	</div>
</div>

