<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[NewsEvents]].
 *
 * @see NewsEvents
 */
class NewsEventsQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return NewsEvents[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return NewsEvents|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
