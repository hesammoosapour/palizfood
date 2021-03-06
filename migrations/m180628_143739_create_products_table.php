<?php

use yii\db\Migration;

/**
 * Handles the creation of table `products`.
 */
class m180628_143739_create_products_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('products', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'price' => $this->integer(),
            'discount_price' => $this->integer(),
            'details' => $this->text(),
            'type' => $this->string(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('products');
    }
}
