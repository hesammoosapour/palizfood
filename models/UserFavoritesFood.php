<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user_favorites_food".
 *
 * @property int $id
 * @property int $user_id
 * @property int $food_id
 * @property string $point
 *
 * @property Food $food
 * @property Users $user
 */
class UserFavoritesFood extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user_favorites_food';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'food_id'], 'required'],
            [['user_id', 'food_id'], 'integer'],
            [['point'], 'string', 'max' => 1],
            [['food_id'], 'exist', 'skipOnError' => true, 'targetClass' => Food::className(), 'targetAttribute' => ['food_id' => 'id']],
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
            'user_id' => Yii::t('app', 'User ID'),
            'food_id' => Yii::t('app', 'Food ID'),
            'point' => Yii::t('app', 'Point'),
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
    public function getUser()
    {
        return $this->hasOne(Users::className(), ['id' => 'user_id']);
    }

    /**
     * {@inheritdoc}
     * @return UserFavoritesFoodQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new UserFavoritesFoodQuery(get_called_class());
    }
}
