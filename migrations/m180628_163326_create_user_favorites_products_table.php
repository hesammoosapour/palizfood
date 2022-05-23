<?php

use yii\db\Migration;

/**
 * Handles the creation of table `user_favorites_products`.
 * Has foreign keys to the tables:
 *
 * - `users`
 * - `products`
 */
class m180628_163326_create_user_favorites_products_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('user_favorites_products', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer()->notNull(),
            'product_id' => $this->integer()->notNull(),
            'point' => $this->char(),
        ]);

        // creates index for column `user_id`
        $this->createIndex(
            'idx-user_favorites_products-user_id',
            'user_favorites_products',
            'user_id'
        );

        // add foreign key for table `users`
        $this->addForeignKey(
            'fk-user_favorites_products-user_id',
            'user_favorites_products',
            'user_id',
            'users',
            'id',
            'CASCADE'
        );

        // creates index for column `product_id`
        $this->createIndex(
            'idx-user_favorites_products-product_id',
            'user_favorites_products',
            'product_id'
        );

        // add foreign key for table `products`
        $this->addForeignKey(
            'fk-user_favorites_products-product_id',
            'user_favorites_products',
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
        // drops foreign key for table `users`
        $this->dropForeignKey(
            'fk-user_favorites_products-user_id',
            'user_favorites_products'
        );

        // drops index for column `user_id`
        $this->dropIndex(
            'idx-user_favorites_products-user_id',
            'user_favorites_products'
        );

        // drops foreign key for table `products`
        $this->dropForeignKey(
            'fk-user_favorites_products-product_id',
            'user_favorites_products'
        );

        // drops index for column `product_id`
        $this->dropIndex(
            'idx-user_favorites_products-product_id',
            'user_favorites_products'
        );

        $this->dropTable('user_favorites_products');
    }
}
