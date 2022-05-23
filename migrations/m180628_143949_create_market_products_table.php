<?php

use yii\db\Migration;

/**
 * Handles the creation of table `market_products`.
 * Has foreign keys to the tables:
 *
 * - `markets`
 * - `products`
 */
class m180628_143949_create_market_products_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('market_products', [
            'id' => $this->primaryKey(),
            'market_id' => $this->integer()->notNull(),
            'product_id' => $this->integer()->notNull(),
        ]);

        // creates index for column `market_id`
        $this->createIndex(
            'idx-market_products-market_id',
            'market_products',
            'market_id'
        );

        // add foreign key for table `markets`
        $this->addForeignKey(
            'fk-market_products-market_id',
            'market_products',
            'market_id',
            'markets',
            'id',
            'CASCADE'
        );

        // creates index for column `product_id`
        $this->createIndex(
            'idx-market_products-product_id',
            'market_products',
            'product_id'
        );

        // add foreign key for table `products`
        $this->addForeignKey(
            'fk-market_products-product_id',
            'market_products',
            'product_id',
            'products',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `markets`
        $this->dropForeignKey(
            'fk-market_products-market_id',
            'market_products'
        );

        // drops index for column `market_id`
        $this->dropIndex(
            'idx-market_products-market_id',
            'market_products'
        );

        // drops foreign key for table `products`
        $this->dropForeignKey(
            'fk-market_products-product_id',
            'market_products'
        );

        // drops index for column `product_id`
        $this->dropIndex(
            'idx-market_products-product_id',
            'market_products'
        );

        $this->dropTable('market_products');
    }
}
