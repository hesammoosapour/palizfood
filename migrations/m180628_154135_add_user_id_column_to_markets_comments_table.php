<?php

use yii\db\Migration;

/**
 * Handles adding user_id to table `markets_comments`.
 * Has foreign keys to the tables:
 *
 * - `users`
 */
class m180628_154135_add_user_id_column_to_markets_comments_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('markets_comments', 'user_id', $this->integer()->notNull());

        // creates index for column `user_id`
        $this->createIndex(
            'idx-markets_comments-user_id',
            'markets_comments',
            'user_id'
        );

        // add foreign key for table `users`
        $this->addForeignKey(
            'fk-markets_comments-user_id',
            'markets_comments',
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
            'fk-markets_comments-user_id',
            'markets_comments'
        );

        // drops index for column `user_id`
        $this->dropIndex(
            'idx-markets_comments-user_id',
            'markets_comments'
        );

        $this->dropColumn('markets_comments', 'user_id');
    }
}
