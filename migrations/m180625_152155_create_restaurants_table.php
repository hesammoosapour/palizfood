<?php

use yii\db\Migration;

/**
 * Handles the creation of table `restaurants`.
 */
class m180625_152155_create_restaurants_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('restaurants', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'location' => $this->string(),
            'service_area' => $this->string(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('restaurants');
    }
}
