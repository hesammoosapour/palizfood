<?php

use yii\db\Migration;

/**
 * Handles the creation of table `client_schedule`.
 * Has foreign keys to the tables:
 *
 * - `business`
 */
class m180627_150521_create_client_schedule_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('client_schedule', [
            'id' => $this->primaryKey(),
            'client_id' => $this->integer()->notNull(),
            'day' => $this->decimal(),
            'closetime' => $this->time(),
            'opentime' => $this->time(),
        ]);

        // creates index for column `client_id`
        $this->createIndex(
            'idx-client_schedule-client_id',
            'client_schedule',
            'client_id'
        );

        // add foreign key for table `business`
        $this->addForeignKey(
            'fk-client_schedule-client_id',
            'client_schedule',
            'client_id',
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
            'fk-client_schedule-client_id',
            'client_schedule'
        );

        // drops index for column `client_id`
        $this->dropIndex(
            'idx-client_schedule-client_id',
            'client_schedule'
        );

        $this->dropTable('client_schedule');
    }
}
