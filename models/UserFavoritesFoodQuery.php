<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[UserFavoritesFood]].
 *
 * @see UserFavoritesFood
 */
class UserFavoritesFoodQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return UserFavoritesFood[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return UserFavoritesFood|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
