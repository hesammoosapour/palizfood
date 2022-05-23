<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "restaurants_foods".
 *
 * @property int $id
 * @property int $restaurant_id
 * @property int $food_id
 * @property int $price
 * @property int $discount
 * @property string $status_food
 * @property string $details
 * @property int $package_price
 * @property int $tax
 *
 * @property Food $food
 * @property Restaurants $restaurant
 */
class RestaurantsFoods extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'restaurants_foods';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['restaurant_id', 'food_id'], 'required'],
            [['restaurant_id', 'food_id', 'price', 'discount', 'package_price', 'tax'], 'integer'],
            [['details'], 'string'],
            [['status_food'], 'string', 'max' => 255],
            [['food_id'], 'exist', 'skipOnError' => true, 'targetClass' => Food::className(), 'targetAttribute' => ['food_id' => 'id']],
            [['restaurant_id'], 'exist', 'skipOnError' => true, 'targetClass' => Restaurants::className(), 'targetAttribute' => ['restaurant_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'restaurant_id' => Yii::t('app', 'Restaurant ID'),
            'food_id' => Yii::t('app', 'Food ID'),
            'price' => Yii::t('app', 'Price'),
            'discount' => Yii::t('app', 'Discount'),
            'status_food' => Yii::t('app', 'Status Food'),
            'details' => Yii::t('app', 'Details'),
            'package_price' => Yii::t('app', 'Package Price'),
            'tax' => Yii::t('app', 'Tax'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFood()
    {
        return $this->hasOne(Food::className(), ['id' => 'food_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRestaurant()
    {
        return $this->hasOne(Restaurants::className(), ['id' => 'restaurant_id']);
    }

    /**
     * {@inheritdoc}
     * @return RestaurantsFoodsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new RestaurantsFoodsQuery(get_called_class());
    }
}
