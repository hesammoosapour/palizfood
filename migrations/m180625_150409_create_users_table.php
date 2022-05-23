<?php
use yii\db\Schema;

use yii\db\Migration;

/**
 * Handles the creation of table `users`.
 */
class m180625_150409_create_users_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('users', [
            'id' => Schema::TYPE_PK,
            'name' => Schema::TYPE_STRING . ' NOT NULL',
            'phonenumber' => Schema::TYPE_DECIMAL,

        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('users');
    }
}
