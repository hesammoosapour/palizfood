<?php

use yii\db\Migration;

/**
 * Handles the creation of table `user_inbox`.
 * Has foreign keys to the tables:
 *
 * - `users`
 */
class m180628_163139_create_user_inbox_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('user_inbox', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer()->notNull(),
            'message' => $this->text(),
        ]);

        // creates index for column `user_id`
        $this->createIndex(
            'idx-user_inbox-user_id',
            'user_inbox',
            'user_id'
        );

        // add foreign key for table `users`
        $this->addForeignKey(
            'fk-user_inbox-user_id',
            'user_inbox',
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
            'fk-user_inbox-user_id',
            'user_inbox'
        );

        // drops index for column `user_id`
        $this->dropIndex(
            'idx-user_inbox-user_id',
            'user_inbox'
        );

        $this->dropTable('user_inbox');
    }
}
