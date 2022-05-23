<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "restaurants".
 *
 * @property int $id
 * @property string $name
 * @property string $location
 * @property string $service_area
 *
 * @property MarketPhotos[] $marketPhotos
 * @property RestaurantPhotos[] $restaurantPhotos
 * @property RestaurantsComments[] $restaurantsComments
 * @property RestaurantsFoods[] $restaurantsFoods
 */
class Restaurants extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'restaurants';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['location'], 'number'],
            [['name', 'service_area'], 'string', 'max' => 1],
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
            'location' => Yii::t('app', 'Location'),
            'service_area' => Yii::t('app', 'Service Area'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMarketPhotos()
    {
        return $this->hasMany(MarketPhotos::className(), ['restaurant_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRestaurantPhotos()
    {
        return $this->hasMany(RestaurantPhotos::className(), ['restaurant_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRestaurantsComments()
    {
        return $this->hasMany(RestaurantsComments::className(), ['restaurant_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRestaurantsFoods()
    {
        return $this->hasMany(RestaurantsFoods::className(), ['restaurant_id' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return RestaurantsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new RestaurantsQuery(get_called_class());
    }
}
