<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\CountForm */
/* @var $form ActiveForm */
?>
<div class="counts">

	<div class="row">

		<div class="col-lg-8 col-md-offset-2">
			<h2 class='heading'>Подбор ассортимента</h2>

			<?php $form = ActiveForm::begin();?>

			<?= $form->field($model, 'products', [
				'labelOptions'=> ['class'=>'count-form-label',
				'template' => '{label}<div class="row"><div class="col-lg-12">{input}{error}{hint}</div></div>']])->checkboxList(
				[
				'6'=>'Свежие овощи и фрукты',
				'7'=>'Овощные и плодово-ягодные консервы', 
				'8'=>'Овощные и плодово-ягодные консервы для детского питания',
				'9'=>'Соления и квашения',
				'10'=>'Быстрозамороженная овощная и плодово-ягодная продукция'
				],
				[
				'item'=>function ($index, $label, $name, $checked, $value){
					return '<div class="col-md-12 check">
					<label><input type="checkbox" />'.$label.'</label>
				</div>';
			}
			]
			)->label("Выберите категории продуктов, которые желаете продавать")->hint('<a href="#" data-toggle="tooltip" title="Для того, чтобы нужную вам продукцию добавили в исходный список, напишите нам пожалуйста о том, чего вам не хватает, используя форму для обратной связи.">Необходимой мне продукции нет в списке, что делать?</a>') ?>


				<?= $form->field($model, 'criteria', [
					'labelOptions'=> ['class'=>'count-form-label'],
					'template' => '{label}<div class="row"><div class="col-lg-12"> {hint}{input}{error}</div></div>'
					])->checkboxList([
					'1'=>'Органолептическая ценность<a href="#" data-toggle="tooltip" data-placement="right" title="Сочетание свойств продукта, которые определяются органами чувств: запах, внешний вид, вкус и т. д."><i class="glyphicon glyphicon-question-sign"></i></a>',
					'2'=>'Доброкачественность и длительность хранения',
					'3'=>'Экологические свойства',
					'4'=>'Кулинарно-технологические свойства<a href="#" data-toggle="tooltip" data-placement="right" title="Cтепень технологической обработки продукта, удобство и затратами времени на приготовление пищи"><i class="glyphicon glyphicon-question-sign"></i></a>',
					'5'=>'Эргономические свойства<a href="#" data-toggle="tooltip" data-placement="right" title="Расфасовка и упаковка продовольственных товаров"><i class="glyphicon glyphicon-question-sign"></i></a>',
					'6'=>'Химическая безопасность'
					],
					[
					'item'=>function ($index, $label, $name, $checked, $value){
						return '<div class="col-md-12 check">
						<label><input type="checkbox" checked/>'.$label.'</label>
					</div>';
				}
				]
				)->label("Потребительские признаки продукции")->hint('Отобранные нами потребительские признаки продукции являются наиболее значимыми для большинства предприятий. Если вы не хотите учитывать какие-то из них - снимите отметки около их названий. Для наилучшего результата рекомендуем использовать все критерии.') ?>

					<?= $form->field($model, 'markets', [
						'labelOptions'=> ['class'=>'count-form-label'],
						'template' => '{label} <div class="row"><div class="col-lg-12">{input}{error}</div></div>'
						])->checkboxList([
						'1'=>'Рынки',
						'2'=>'Специализированные магазины',
						'3'=>'Супермаркеты',
						'4'=>'Рестораны и кафе'
						],
						[
						'item'=>function ($index, $label, $name, $checked, $value){
							return '<div class="col-md-12 check">
							<label><input type="checkbox" />'.$label.'</label>
						</div>';
					}
					]
					)->label("Желаемые рынки сбыта") ?>

					<div class="form-group text-center">
						<?= Html::submitButton('Получить оптимальный ассортимент', ['class' => 'btn btn-primary']) ?>
					</div>
					<?php ActiveForm::end(); ?>
				</div>
			</div>
			<!-- counts -->
