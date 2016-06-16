<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "marketcriteria".
 *
 * @property integer $idMarket
 * @property integer $idCriteria
 * @property double $marketCriteriaReview
 *
 * @property Markets $idMarket0
 * @property Criteria $idCriteria0
 */
class MarketCriteria extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'marketcriteria';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idMarket', 'idCriteria', 'marketCriteriaReview'], 'required'],
            [['idMarket', 'idCriteria'], 'integer'],
            [['marketCriteriaReview'], 'number'],
            [['idMarket'], 'exist', 'skipOnError' => true, 'targetClass' => Markets::className(), 'targetAttribute' => ['idMarket' => 'IdMarket']],
            [['idCriteria'], 'exist', 'skipOnError' => true, 'targetClass' => Criteria::className(), 'targetAttribute' => ['idCriteria' => 'idCriteria']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idMarket' => 'Id Market',
            'idCriteria' => 'Id Criteria',
            'marketCriteriaReview' => 'Market Criteria Review',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdMarket0()
    {
        return $this->hasOne(Markets::className(), ['IdMarket' => 'idMarket']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdCriteria0()
    {
        return $this->hasOne(Criteria::className(), ['idCriteria' => 'idCriteria']);
    }
}
