<?php

use yii\db\Migration;

/**
 * Handles the creation of table `region_price`.
 */
class m180627_155154_create_region_price_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('region_price', [
            'id' => $this->primaryKey(),
            'region' => $this->string(),
            'price' => $this->decimal(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('region_price');
    }
}
