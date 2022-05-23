<?php

use yii\db\Migration;

/**
 * Handles adding user_id to table `restaurants_comments`.
 * Has foreign keys to the tables:
 *
 * - `users`
 */
class m180628_154033_add_user_id_column_to_restaurants_comments_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('restaurants_comments', 'user_id', $this->integer()->notNull());

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

        $this->dropColumn('restaurants_comments', 'user_id');
    }
}
