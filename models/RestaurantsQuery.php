<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Restaurants]].
 *
 * @see Restaurants
 */
class RestaurantsQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return Restaurants[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Restaurants|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
