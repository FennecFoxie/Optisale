<?php

namespace app\models;

use Yii;
use app\models\MarketCriteria;


/**
 * This is the model class for table "markets".
 *
 * @property integer $IdMarket
 * @property string $marketName
 *
 * @property Marketcriteria[] $marketcriterias
 */
class Markets extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'markets';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
        [['marketName'], 'required'],
        [['marketName'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
        'IdMarket' => 'Id Market',
        'marketName' => 'Market Name',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */

    // связь в базе данных
    public function getMarketcriterias()
    {
        return $this->hasMany(Marketcriteria::className(), ['IdMarket' => 'IdMarket']);
    }


    // получение экспертных оценок по выбранным рынкам и критериям
    public static function getMarketReviews($markets, $criteria) 
    {
        $reviews = MarketCriteria::find()->where(['idMarket' => $markets, 'idCriteria' => $criteria])->asArray()->all();
        return $reviews;
    }
}
