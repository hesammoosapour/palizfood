<?php

use yii\db\Migration;

/**
 * Handles the creation of table `restaurants_foods`.
 */
class m180627_123028_create_restaurants_foods_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('restaurants_foods', [
            'id' => $this->primaryKey(),
            'restaurant_id' => $this->integer()->notNull(),
            'food_id' => $this->integer()->notNull(),
        ]);
        $this->createIndex(
            'idx-restaurants_foods-restaurant_id',
            'restaurants_foods',
            'restaurant_id'
        );
        $this->addForeignKey(
            'fk-restaurants_foods-restaurant_id',
            'restaurants_foods',
            'restaurant_id',
            'restaurants',
            'id',
            'CASCADE'
        );
        $this->createIndex(
            'idx-restaurants_foods-food_id',
            'restaurants_foods',
            'food_id'
        );
        $this->addForeignKey(
            'fk-restaurants_foods-food_id',
            'restaurants_foods',
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
        $this->dropTable('restaurants_foods');
    }
}
