<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "markets_comments".
 *
 * @property int $id
 * @property int $market_id
 * @property string $content
 * @property int $user_id
 *
 * @property Markets $market
 * @property Users $user
 */
class MarketsComments extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'markets_comments';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['market_id', 'user_id'], 'required'],
            [['market_id', 'user_id'], 'integer'],
            [['content'], 'string'],
            [['market_id'], 'exist', 'skipOnError' => true, 'targetClass' => Markets::className(), 'targetAttribute' => ['market_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => Users::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'market_id' => Yii::t('app', 'Market ID'),
            'content' => Yii::t('app', 'Content'),
            'user_id' => Yii::t('app', 'User ID'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMarket()
    {
        return $this->hasOne(Markets::className(), ['id' => 'market_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(Users::className(), ['id' => 'user_id']);
    }

    /**
     * {@inheritdoc}
     * @return MarketsCommentsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new MarketsCommentsQuery(get_called_class());
    }
}
