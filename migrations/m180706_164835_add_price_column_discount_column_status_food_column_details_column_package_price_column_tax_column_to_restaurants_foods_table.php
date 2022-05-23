<?php

use yii\db\Migration;

/**
 * Handles adding price_column_discount_column_status_food_column_details_column_package_price_column_tax to table `restaurants_foods`.
 */
class m180706_164835_add_price_column_discount_column_status_food_column_details_column_package_price_column_tax_column_to_restaurants_foods_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('restaurants_foods', 'price', $this->integer());
        $this->addColumn('restaurants_foods', 'discount', $this->integer());
        $this->addColumn('restaurants_foods', 'status_food', $this->string());
        $this->addColumn('restaurants_foods', 'details', $this->text());
        $this->addColumn('restaurants_foods', 'package_price', $this->integer());
        $this->addColumn('restaurants_foods', 'tax', $this->integer());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('restaurants_foods', 'price');
        $this->dropColumn('restaurants_foods', 'discount');
        $this->dropColumn('restaurants_foods', 'status_food');
        $this->dropColumn('restaurants_foods', 'details');
        $this->dropColumn('restaurants_foods', 'package_price');
        $this->dropColumn('restaurants_foods', 'tax');
    }
}
