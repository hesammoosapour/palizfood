<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[ClientSchedule]].
 *
 * @see ClientSchedule
 */
class ClientScheduleQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return ClientSchedule[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return ClientSchedule|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
