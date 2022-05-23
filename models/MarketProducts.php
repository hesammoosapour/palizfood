<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "market_products".
 *
 * @property int $id
 * @property int $market_id
 * @property int $product_id
 * @property int $price
 * @property int $discount
 * @property string $status_existence
 * @property string $details
 * @property int $package_price
 * @property int $tax
 *
 * @property Markets $market
 * @property Products $product
 */
class MarketProducts extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'market_products';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['market_id', 'product_id'], 'required'],
            [['market_id', 'product_id', 'price', 'discount', 'package_price', 'tax'], 'integer'],
            [['details'], 'string'],
            [['status_existence'], 'string', 'max' => 255],
            [['market_id'], 'exist', 'skipOnError' => true, 'targetClass' => Markets::className(), 'targetAttribute' => ['market_id' => 'id']],
            [['product_id'], 'exist', 'skipOnError' => true, 'targetClass' => Products::className(), 'targetAttribute' => ['product_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'market_id' => Yii::t('app', 'Market ID'),
            'product_id' => Yii::t('app', 'Product ID'),
            'price' => Yii::t('app', 'Price'),
            'discount' => Yii::t('app', 'Discount'),
            'status_existence' => Yii::t('app', 'Status Existence'),
            'details' => Yii::t('app', 'Details'),
            'package_price' => Yii::t('app', 'Package Price'),
            'tax' => Yii::t('app', 'Tax'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMarket()
    {
        return $this->hasOne(Markets::className(), ['id' => 'market_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProduct()
    {
        return $this->hasOne(Products::className(), ['id' => 'product_id']);
    }

    /**
     * {@inheritdoc}
     * @return MarketProductsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new MarketProductsQuery(get_called_class());
    }
}
