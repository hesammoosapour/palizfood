<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "client_schedule".
 *
 * @property int $id
 * @property int $client_id
 * @property string $day
 * @property string $closetime
 * @property string $opentime
 *
 * @property Business $client
 */
class ClientSchedule extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'client_schedule';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['client_id'], 'required'],
            [['client_id'], 'integer'],
            [['day'], 'number'],
            [['closetime', 'opentime'], 'safe'],
            [['client_id'], 'exist', 'skipOnError' => true, 'targetClass' => Business::className(), 'targetAttribute' => ['client_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'client_id' => Yii::t('app', 'Client ID'),
            'day' => Yii::t('app', 'Day'),
            'closetime' => Yii::t('app', 'Closetime'),
            'opentime' => Yii::t('app', 'Opentime'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getClient()
    {
        return $this->hasOne(Business::className(), ['id' => 'client_id']);
    }

    /**
     * {@inheritdoc}
     * @return ClientScheduleQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ClientScheduleQuery(get_called_class());
    }
}
