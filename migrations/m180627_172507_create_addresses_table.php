<?php

use yii\db\Migration;

/**
 * Handles the creation of table `addresses`.
 * Has foreign keys to the tables:
 *
 * - `users`
 */
class m180627_172507_create_addresses_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('addresses', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer()->notNull(),
            'address' => $this->string(),
        ]);

        // creates index for column `user_id`
        $this->createIndex(
            'idx-addresses-user_id',
            'addresses',
            'user_id'
        );

        // add foreign key for table `users`
        $this->addForeignKey(
            'fk-addresses-user_id',
            'addresses',
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
            'fk-addresses-user_id',
            'addresses'
        );

        // drops index for column `user_id`
        $this->dropIndex(
            'idx-addresses-user_id',
            'addresses'
        );

        $this->dropTable('addresses');
    }
}
