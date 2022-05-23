<?php

use yii\db\Migration;

/**
 * Handles the creation of table `news_events`.
 * Has foreign keys to the tables:
 *
 * - `users`
 */
class m180701_152042_create_news_events_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('news_events', [
            'id' => $this->primaryKey(),
            'title' => $this->string(),
            'content' => $this->string(),
            'business_id' => $this->integer()->notNull(),
        ]);

        // creates index for column `business_id`
        $this->createIndex(
            'idx-news_events-business_id',
            'news_events',
            'business_id'
        );

        // add foreign key for table `users`
        $this->addForeignKey(
            'fk-news_events-business_id',
            'news_events',
            'business_id',
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
            'fk-news_events-business_id',
            'news_events'
        );

        // drops index for column `business_id`
        $this->dropIndex(
            'idx-news_events-business_id',
            'news_events'
        );

        $this->dropTable('news_events');
    }
}
