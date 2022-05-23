<?php

use yii\db\Migration;

/**
 * Handles the creation of table `markets`.
 */
class m180628_142545_create_markets_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('markets', [
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
        $this->dropTable('markets');
    }
}
