<?php

use yii\db\Migration;

/**
 * Handles the creation of table `markets_comments`.
 * Has foreign keys to the tables:
 *
 * - `markets`
 * - `users`
 */
class m180706_162554_create_markets_comments_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('markets_comments', [
            'id' => $this->primaryKey(),
            'market_id' => $this->integer()->notNull(),
            'content' => $this->text(),
            'user_id' => $this->integer()->notNull(),
        ]);

        // creates index for column `market_id`
        $this->createIndex(
            'idx-markets_comments-market_id',
            'markets_comments',
            'market_id'
        );

        // add foreign key for table `markets`
        $this->addForeignKey(
            'fk-markets_comments-market_id',
            'markets_comments',
            'market_id',
            'markets',
            'id',
            'CASCADE'
        );

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
        // drops foreign key for table `markets`
        $this->dropForeignKey(
            'fk-markets_comments-market_id',
            'markets_comments'
        );

        // drops index for column `market_id`
        $this->dropIndex(
            'idx-markets_comments-market_id',
            'markets_comments'
        );

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

        $this->dropTable('markets_comments');
    }
}
