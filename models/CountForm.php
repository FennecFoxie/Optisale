<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * CountForm is the model behind the count form.
 *
 */
class CountForm extends Model
{
    public $products = [];
    public $criteria = [];
    public $markets = [];



     public function attributeLabels()
    {
        return [
        'products' => 'категорий продуктов',
        'criteria' => 'пользовательских признаков',
        'markets' => 'рынков сбыта',
        ];
    }

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            [['products', 'criteria', 'markets'], 'required',
                'message'=>'Пожалуйста, выберите хотя бы одно значение для {attribute}'],
        ];
    }



}

?>
