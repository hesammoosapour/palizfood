<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "users".
 *
 * @property int $id
 * @property string $name
 * @property string $phonenumber
 *
 * @property Addresses[] $addresses
 * @property ClientSchedule[] $clientSchedules
 * @property MarketsComments[] $marketsComments
 * @property NewsEvents[] $newsEvents
 * @property Orders[] $orders
 * @property RestaurantsComments[] $restaurantsComments
 * @property UserFavoritesFood[] $userFavoritesFoods
 * @property UserFavoritesProducts[] $userFavoritesProducts
 * @property UserInbox[] $userInboxes
 */
class Users extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'users';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['phonenumber'], 'number'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'phonenumber' => 'Phonenumber',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAddresses()
    {
        return $this->hasMany(Addresses::className(), ['user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getClientSchedules()
    {
        return $this->hasMany(ClientSchedule::className(), ['client_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMarketsComments()
    {
        return $this->hasMany(MarketsComments::className(), ['user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNewsEvents()
    {
        return $this->hasMany(NewsEvents::className(), ['business_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrders()
    {
        return $this->hasMany(Orders::className(), ['user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRestaurantsComments()
    {
        return $this->hasMany(RestaurantsComments::className(), ['user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserFavoritesFoods()
    {
        return $this->hasMany(UserFavoritesFood::className(), ['user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserFavoritesProducts()
    {
        return $this->hasMany(UserFavoritesProducts::className(), ['user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserInboxes()
    {
        return $this->hasMany(UserInbox::className(), ['user_id' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return UsersQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new UsersQuery(get_called_class());
    }
}
