<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "region_price".
 *
 * @property int $id
 * @property string $region
 * @property string $price
 * @property int $business_id
 *
 * @property Business $business
 */
class RegionPrice extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'region_price';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['price'], 'number'],
            [['business_id'], 'required'],
            [['business_id'], 'integer'],
            [['region'], 'string', 'max' => 1],
            [['business_id'], 'exist', 'skipOnError' => true, 'targetClass' => Business::className(), 'targetAttribute' => ['business_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'region' => Yii::t('app', 'Region'),
            'price' => Yii::t('app', 'Price'),
            'business_id' => Yii::t('app', 'Business ID'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBusiness()
    {
        return $this->hasOne(Business::className(), ['id' => 'business_id']);
    }

    /**
     * {@inheritdoc}
     * @return RegionPriceQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new RegionPriceQuery(get_called_class());
    }
}
