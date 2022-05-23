<?php

use yii\db\Migration;

/**
 * Handles the creation of table `restaurants_comments`.
 * Has foreign keys to the tables:
 *
 * - `restaurants`
 * - `users`
 */
class m180706_162147_create_restaurants_comments_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('restaurants_comments', [
            'id' => $this->primaryKey(),
            'restaurant_id' => $this->integer()->notNull(),
            'content' => $this->text(),
            'user_id' => $this->integer()->notNull(),
        ]);

        // creates index for column `restaurant_id`
        $this->createIndex(
            'idx-restaurants_comments-restaurant_id',
            'restaurants_comments',
            'restaurant_id'
        );

        // add foreign key for table `restaurants`
        $this->addForeignKey(
            'fk-restaurants_comments-restaurant_id',
            'restaurants_comments',
            'restaurant_id',
            'restaurants',
            'id',
            'CASCADE'
        );

        // creates index for column `user_id`
        $this->createIndex(
            'idx-restaurants_comments-user_id',
            'restaurants_comments',
            'user_id'
        );

        // add foreign key for table `users`
        $this->addForeignKey(
            'fk-restaurants_comments-user_id',
            'restaurants_comments',
            'user_id',
            'users',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `restaurants`
        $this->dropForeignKey(
            'fk-restaurants_comments-restaurant_id',
            'restaurants_comments'
        );

        // drops index for column `restaurant_id`
        $this->dropIndex(
            'idx-restaurants_comments-restaurant_id',
            'restaurants_comments'
        );

        // drops foreign key for table `users`
        $this->dropForeignKey(
            'fk-restaurants_comments-user_id',
            'restaurants_comments'
        );

        // drops index for column `user_id`
        $this->dropIndex(
            'idx-restaurants_comments-user_id',
            'restaurants_comments'
        );

        $this->dropTable('restaurants_comments');
    }
}
