<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "markets".
 *
 * @property int $id
 * @property string $name
 * @property string $location
 * @property string $service_area
 *
 * @property MarketProducts[] $marketProducts
 * @property MarketsComments[] $marketsComments
 */
class Markets extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'markets';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'location', 'service_area'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Name'),
            'location' => Yii::t('app', 'Location'),
            'service_area' => Yii::t('app', 'Service Area'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMarketProducts()
    {
        return $this->hasMany(MarketProducts::className(), ['market_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMarketsComments()
    {
        return $this->hasMany(MarketsComments::className(), ['market_id' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return MarketsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new MarketsQuery(get_called_class());
    }
}
