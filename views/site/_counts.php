<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\CountForm */
/* @var $form ActiveForm */
?>


<div class="counts" id='counts'>

	<div class="row">

		<div class="col-lg-8 col-md-offset-2">
			<h2 class='heading'>Подбор ассортимента</h2>

			<?php $form = ActiveForm::begin();?>

			<?= $form->field($model, 'products', [
				'labelOptions'=> ['class'=>'count-form-label',
				'template' => '{label}<div class="row"><div class="col-lg-12"> {hint}{input}{error}</div></div>']])->checkboxList(
				[
				'6'=>'Свежие овощи и фрукты',
				'7'=>'Овощные и плодово-ягодные консервы', 
				'8'=>'Овощные и плодово-ягодные консервы для детского питания',
				'9'=>'Соления и квашения',
				'10'=>'Быстрозамороженная овощная и плодово-ягодная продукция'
				],
				[
				'item'=>function ($index, $label, $name, $checked, $value){
					return '<div class="col-md-12 check">'.Html::checkbox($name, $checked, [
						'value' => $value,
						'label' => Html::encode($label)]).'</div>';
				}
				]
				)->label("Выберите категории продуктов, которые желаете продавать")->hint('Выберите по крайней мере два вида продукции'); ?>


<a href="#" data-toggle="tooltip" title="Для того, чтобы нужную вам продукцию добавили в исходный список, напишите нам пожалуйста о том, чего вам не хватает, используя форму для обратной связи.">Необходимой мне продукции нет в списке, что делать?</a><br><br>

				<?= $form->field($model, 'criteria', [
					'labelOptions'=> ['class'=>'count-form-label'],
					'template' => '{label}<div class="row"><div class="col-lg-12"> {hint}{input}{error}</div></div>'
					])->checkboxList([
					'1'=>'Органолептическая ценность<span data-toggle="tooltip" data-placement="right" title="Сочетание свойств продукта, которые определяются органами чувств: запах, внешний вид, вкус и т. д."><i class="glyphicon glyphicon-question-sign"></i></span>',
					'2'=>'Доброкачественность и длительность хранения',
					'3'=>'Экологические свойства',
					'4'=>'Кулинарно-технологические свойства<span data-toggle="tooltip" data-placement="right" title="Cтепень технологической обработки продукта, удобство и затратами времени на приготовление пищи"><i class="glyphicon glyphicon-question-sign"></i></span>',
					'5'=>'Эргономические свойства<span href="" data-toggle="tooltip" data-placement="right" title="Расфасовка и упаковка продовольственных товаров"><i class="glyphicon glyphicon-question-sign"></i></span>',
					'6'=>'Химическая безопасность'
					],
					[
					'item'=>function ($index, $label, $name, $checked, $value){
						return '<div class="col-md-12 check">'.Html::checkbox($name, $checked, [
							'value' => $value,
							'label' => $label]).'</div>';
					}
					]
					)->label("Потребительские признаки продукции")->hint('Отобранные нами потребительские признаки продукции являются наиболее значимыми для большинства предприятий. Для наилучшего результата рекомендуем использовать все критерии, однако это не является обязательным.') ?>

					<?= $form->field($model, 'markets', [
						'labelOptions'=> ['class'=>'count-form-label'],
						'template' => '{label} <div class="row"><div class="col-lg-12">{hint}{input}{error}</div></div>'
						])->checkboxList([
						'1'=>'Рынки',
						'2'=>'Специализированные магазины',
						'3'=>'Супермаркеты',
						'4'=>'Рестораны и кафе'
						],
						[
						'item'=>function ($index, $label, $name, $checked, $value){
							return '<div class="col-md-12 check">'.Html::checkbox($name, $checked, [
								'value' => $value,
								'label' => Html::encode($label)]).'</div>';
						}
						]
						)->label("Желаемые рынки сбыта")->hint('Выберите по крайней мере два вида рынков сбыта') ?>

						<div class="form-group text-center">
							<?= Html::submitButton('Получить оптимальный ассортимент', ['class' => 'btn btn-primary']) ?>
						</div>
						<?php ActiveForm::end(); ?>
					</div>
				</div>
				<!-- counts -->
