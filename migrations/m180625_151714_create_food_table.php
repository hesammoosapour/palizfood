<?php

use yii\db\Migration;

/**
 * Handles the creation of table `food`.
 */
class m180625_151714_create_food_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('food', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'price' => $this->decimal(),
            'discount_price' => $this->decimal(),
            'details' => $this->text(),
            'type' => $this->string()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('food');
    }
}
