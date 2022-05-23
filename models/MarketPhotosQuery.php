<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[MarketPhotos]].
 *
 * @see MarketPhotos
 */
class MarketPhotosQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return MarketPhotos[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return MarketPhotos|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
