<?php

namespace app\models;

use Yii;
use app\models\ProductCriteria;

/**
 * This is the model class for table "products".
 *
 * @property integer $idProduct
 * @property string $productName
 * @property double $productExpertRewiew
 */
class Products extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'products';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
        [['productName', 'productExpertRewiew'], 'required'],
        [['productExpertRewiew'], 'number'],
        [['productName'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
        'idProduct' => 'Id Product',
        'productName' => 'Product Name',
        'productExpertRewiew' => 'Product Expert Rewiew',
        ];
    }

    public static function getAllProducts() {
        $products = Products::find(['idProduct', 'productName'])->asArray()->all();
        return $products;
    }

    public function getIdCriterias()
    {
        return $this->hasMany(Criterias::className(), ['idProduct' => 'idProduct'])->viaTable('productcriteria', ['idProduct' => 'idProduct']);
    }

    public static function getProductReviews($products, $criteria) 
    {
        $reviews = ProductCriteria::find()->where(['idProduct' => $products, 'idCriteria' => $criteria])->asArray()->all();
        return $reviews;
    }

}
