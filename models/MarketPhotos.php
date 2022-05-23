<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "market_photos".
 *
 * @property int $id
 * @property string $name
 * @property int $market_id
 *
 * @property Markets $market
 */
class MarketPhotos extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'market_photos';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['market_id'], 'required'],
            [['market_id'], 'integer'],
//            [['name'], 'string', 'max' => 255],
            [['name'], 'file', 'skipOnEmpty' => false, 'maxFiles' => 10, 'extensions' => 'png, jpg','jpeg'],

            [['market_id'], 'exist', 'skipOnError' => true, 'targetClass' => Markets::className(), 'targetAttribute' => ['market_id' => 'id']],
        ];
    }

    public function upload() {
        if ($this->validate()) {
            foreach ($this->name as $file) {
                $file->saveAs('uploads/' . $file->baseName . '.' . $file->extension);
            }
            return true;
        } else {
            return false;
        }
    }
    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Name'),
            'market_id' => Yii::t('app', 'Market ID'),
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
     * {@inheritdoc}
     * @return MarketPhotosQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new MarketPhotosQuery(get_called_class());
    }
}
