<?php

use yii\db\Migration;

/**
 * Handles the creation of table `user_favorites_food`.
 * Has foreign keys to the tables:
 *
 * - `users`
 * - `food`
 */
class m180628_163236_create_user_favorites_food_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('user_favorites_food', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer()->notNull(),
            'food_id' => $this->integer()->notNull(),
            'point' => $this->char(),
        ]);

        // creates index for column `user_id`
        $this->createIndex(
            'idx-user_favorites_food-user_id',
            'user_favorites_food',
            'user_id'
        );

        // add foreign key for table `users`
        $this->addForeignKey(
            'fk-user_favorites_food-user_id',
            'user_favorites_food',
            'user_id',
            'users',
            'id',
            'CASCADE'
        );

        // creates index for column `food_id`
        $this->createIndex(
            'idx-user_favorites_food-food_id',
            'user_favorites_food',
            'food_id'
        );

        // add foreign key for table `food`
        $this->addForeignKey(
            'fk-user_favorites_food-food_id',
            'user_favorites_food',
            'food_id',
            'food',
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
            'fk-user_favorites_food-user_id',
            'user_favorites_food'
        );

        // drops index for column `user_id`
        $this->dropIndex(
            'idx-user_favorites_food-user_id',
            'user_favorites_food'
        );

        // drops foreign key for table `food`
        $this->dropForeignKey(
            'fk-user_favorites_food-food_id',
            'user_favorites_food'
        );

        // drops index for column `food_id`
        $this->dropIndex(
            'idx-user_favorites_food-food_id',
            'user_favorites_food'
        );

        $this->dropTable('user_favorites_food');
    }
}
