<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "food".
 *
 * @property int $id
 * @property string $name
 * @property string $price
 * @property string $discount_price
 * @property string $details
 * @property string $type
 *
 * @property RestaurantsFoods[] $restaurantsFoods
 * @property UserFavoritesFood[] $userFavoritesFoods
 */
class Food extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'food';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['price', 'discount_price'], 'number'],
            [['details'], 'string'],
            [['name'], 'string', 'max' => 1],
            [['type'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Name'),
            'price' => Yii::t('app', 'Price'),
            'discount_price' => Yii::t('app', 'Discount Price'),
            'details' => Yii::t('app', 'Details'),
            'type' => Yii::t('app', 'Type'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRestaurantsFoods()
    {
        return $this->hasMany(RestaurantsFoods::className(), ['food_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserFavoritesFoods()
    {
        return $this->hasMany(UserFavoritesFood::className(), ['food_id' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return FoodQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new FoodQuery(get_called_class());
    }
}
