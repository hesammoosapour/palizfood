<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[RestaurantsComments]].
 *
 * @see RestaurantsComments
 */
class RestaurantsCommentsQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return RestaurantsComments[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return RestaurantsComments|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
