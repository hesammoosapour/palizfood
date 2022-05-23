<?php

use yii\db\Migration;

/**
 * Handles adding business_id to table `region_price`.
 * Has foreign keys to the tables:
 *
 * - `business`
 */
class m180704_141910_add_business_id_column_to_region_price_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('region_price', 'business_id', $this->integer()->notNull());

        // creates index for column `business_id`
        $this->createIndex(
            'idx-region_price-business_id',
            'region_price',
            'business_id'
        );

        // add foreign key for table `business`
        $this->addForeignKey(
            'fk-region_price-business_id',
            'region_price',
            'business_id',
            'business',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `business`
        $this->dropForeignKey(
            'fk-region_price-business_id',
            'region_price'
        );

        // drops index for column `business_id`
        $this->dropIndex(
            'idx-region_price-business_id',
            'region_price'
        );

        $this->dropColumn('region_price', 'business_id');
    }
}
