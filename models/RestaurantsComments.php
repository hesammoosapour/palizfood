<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "restaurants_comments".
 *
 * @property int $id
 * @property int $restaurant_id
 * @property string $content
 * @property int $user_id
 *
 * @property Restaurants $restaurant
 * @property Users $user
 */
class RestaurantsComments extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'restaurants_comments';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['restaurant_id', 'user_id'], 'required'],
            [['restaurant_id', 'user_id'], 'integer'],
            [['content'], 'string'],
            [['restaurant_id'], 'exist', 'skipOnError' => true, 'targetClass' => Restaurants::className(), 'targetAttribute' => ['restaurant_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => Users::className(), 'targetAttribute' => ['user_id' => 'id']],
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
            'content' => Yii::t('app', 'Content'),
            'user_id' => Yii::t('app', 'User ID'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRestaurant()
    {
        return $this->hasOne(Restaurants::className(), ['id' => 'restaurant_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(Users::className(), ['id' => 'user_id']);
    }

    /**
     * {@inheritdoc}
     * @return RestaurantsCommentsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new RestaurantsCommentsQuery(get_called_class());
    }
}
