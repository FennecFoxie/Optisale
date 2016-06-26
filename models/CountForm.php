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
        [['criteria'], 'required', 'message'=>'Пожалуйста, выберите хотя бы одно значение для {attribute}'],
        [['markets'], function($attribute, $params){
             if(count($this->$attribute) < 2){
         $this->addError($attribute,'Пожалуйста, выберите хотя бы два значения для рынков сбыта');
     }}],
      [['products'], function($attribute, $params){
             if(count($this->$attribute) < 2){
         $this->addError($attribute,'Пожалуйста, выберите хотя бы два значения для категорий продуктов');
     }}],

     [['markets', 'products', 'criteria'], 'required', 'message'=>'Пожалуйста, выберите хотя бы два значения для {attribute}'],
        ];
    }


     public function scenarios()
    {
        $scenarios = [
            'some_scenario' => ['markets', 'products', 'criteria'],
        ];

        return array_merge(parent::scenarios(), $scenarios);
    }


        public function isEnothLong($attribute){
     if(count($this->$attribute) < 2){
         $this->addError($attribute,'Выберите по крайней мере два элемента');
     }
}


// @product and @market are single expertReview values, $criteria is array of selected criteries
    public function productMarketMembershipFunction($productReview, $marketReview)
    {
        $numenator = 0;
        $denumenator = 0;

        $numenator += $productReview['ProductCriteriaReview'] * $marketReview['marketCriteriaReview'];

        $denumenator += $productReview['ProductCriteriaReview'];

        $result = $numenator / $denumenator;

        return $result;

    }

//get composition of the matrixes
    public function compositeReviews($productReviews, $marketReviews)
    {
        $composition = [];
        for ($i=0; $i < count($productReviews); $i++)
        { 
            for ($j=0; $j < count($marketReviews); $j++)
            { 
              $composition[$i][$j] = self::productMarketMembershipFunction($productReviews[$i], $marketReviews[$j]);
          }
      }
      return $composition;
  }


//gets the result of function compositeReviews()
  public function getThereshold($composition)
  { 
    $maxCols = [];
    

            for ($j=0; $j < count($composition); $j++){
                $maxCols[$j] = 0;
            }
        

    for ($i=0; $i < count($composition); $i++)
        { 
            for ($j=0; $j < count($composition[$i]); $j++)
            {
                if($composition[$i][$j] > $maxCols[$j])
                $maxCols[$j] = $composition[$i][$j];
            }
    }

    $omega = 9999; // magic number

    for ($i=0; $i < count($maxCols); $i++) { 
        if($maxCols[$i] < $omega)
            $omega = $maxCols[$i];
    }

    return $omega;
  }


//applying the counted thereshold to the composition od matrixes
  public function applyThereshold($composition, $thereshold)
  {
    $result = [];
    for ($i=0; $i < count($composition); $i++)
        { 
            for ($j=0; $j < count($composition[$i]); $j++)
            {
                if($composition[$i][$j] >= $thereshold)
                array_push($result, $composition[$i][$j]);
            }
    }

    return $result;
  }

}

?>
