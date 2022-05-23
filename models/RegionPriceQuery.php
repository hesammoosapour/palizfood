<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[RegionPrice]].
 *
 * @see RegionPrice
 */
class RegionPriceQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return RegionPrice[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return RegionPrice|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
