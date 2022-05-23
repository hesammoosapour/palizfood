<?php

use yii\db\Migration;

/**
 * Handles adding address_id to table `orders`.
 * Has foreign keys to the tables:
 *
 * - `addresses`
 */
class m180628_161740_add_address_id_column_to_orders_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('orders', 'address_id', $this->integer()->notNull());

        // creates index for column `address_id`
        $this->createIndex(
            'idx-orders-address_id',
            'orders',
            'address_id'
        );

        // add foreign key for table `addresses`
        $this->addForeignKey(
            'fk-orders-address_id',
            'orders',
            'address_id',
            'addresses',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `addresses`
        $this->dropForeignKey(
            'fk-orders-address_id',
            'orders'
        );

        // drops index for column `address_id`
        $this->dropIndex(
            'idx-orders-address_id',
            'orders'
        );

        $this->dropColumn('orders', 'address_id');
    }
}
