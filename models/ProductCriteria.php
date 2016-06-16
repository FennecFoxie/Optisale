<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "productcriteria".
 *
 * @property integer $idCriteria
 * @property integer $idProduct
 * @property double $ProductCriteriaReview
 *
 * @property Products $idProduct0
 * @property Criteria $idCriteria0
 */
class ProductCriteria extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'productcriteria';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idCriteria', 'idProduct', 'ProductCriteriaReview'], 'required'],
            [['idCriteria', 'idProduct'], 'integer'],
            [['ProductCriteriaReview'], 'number'],
            [['idProduct'], 'exist', 'skipOnError' => true, 'targetClass' => Products::className(), 'targetAttribute' => ['idProduct' => 'idProduct']],
            [['idCriteria'], 'exist', 'skipOnError' => true, 'targetClass' => Criteria::className(), 'targetAttribute' => ['idCriteria' => 'idCriteria']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idCriteria' => 'Id Criteria',
            'idProduct' => 'Id Product',
            'ProductCriteriaReview' => 'Product Criteria Review',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdProduct0()
    {
        return $this->hasOne(Products::className(), ['idProduct' => 'idProduct']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdCriteria0()
    {
        return $this->hasOne(Criteria::className(), ['idCriteria' => 'idCriteria']);
    }
}
