<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "criteria".
 *
 * @property integer $idCriteria
 * @property string $criteriaName
 * @property string $criteriaDescription
 *
 * @property Productcriteria[] $productcriterias
 * @property Products[] $idProducts
 */
class Criteria extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'criteria';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['criteriaName'], 'required'],
            [['criteriaName'], 'string', 'max' => 50],
            [['criteriaDescription'], 'string', 'max' => 200],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idCriteria' => 'Id Criteria',
            'criteriaName' => 'Criteria Name',
            'criteriaDescription' => 'Criteria Description',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductcriterias()
    {
        return $this->hasMany(Productcriteria::className(), ['idCriteria' => 'idCriteria']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdProducts()
    {
        return $this->hasMany(Products::className(), ['idProduct' => 'idProduct'])->viaTable('productcriteria', ['idCriteria' => 'idCriteria']);
    }

        public function getIdMarkets()
    {
        return $this->hasMany(Markets::className(), ['idMarket' => 'idMarket'])->viaTable('productcriteria', ['idCriteria' => 'idCriteria']);
    }
}
