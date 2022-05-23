<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[MarketsComments]].
 *
 * @see MarketsComments
 */
class MarketsCommentsQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return MarketsComments[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return MarketsComments|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
