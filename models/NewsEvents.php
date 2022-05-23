<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "news_events".
 *
 * @property int $id
 * @property string $title
 * @property string $content
 * @property int $business_id
 *
 * @property Users $business
 */
class NewsEvents extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'news_events';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['business_id'], 'required'],
            [['business_id'], 'integer'],
            [['title', 'content'], 'string', 'max' => 255],
            [['business_id'], 'exist', 'skipOnError' => true, 'targetClass' => Users::className(), 'targetAttribute' => ['business_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'title' => Yii::t('app', 'Title'),
            'content' => Yii::t('app', 'Content'),
            'business_id' => Yii::t('app', 'Business ID'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBusiness()
    {
        return $this->hasOne(Users::className(), ['id' => 'business_id']);
    }

    /**
     * {@inheritdoc}
     * @return NewsEventsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new NewsEventsQuery(get_called_class());
    }
}
