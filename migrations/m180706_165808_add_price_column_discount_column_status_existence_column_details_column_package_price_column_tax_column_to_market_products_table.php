<?php

use yii\db\Migration;

/**
 * Handles adding price_column_discount_column_status_existence_column_details_column_package_price_column_tax to table `market_products`.
 */
class m180706_165808_add_price_column_discount_column_status_existence_column_details_column_package_price_column_tax_column_to_market_products_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('market_products', 'price', $this->integer());
        $this->addColumn('market_products', 'discount', $this->integer());
        $this->addColumn('market_products', 'status_existence', $this->string());
        $this->addColumn('market_products', 'details', $this->text());
        $this->addColumn('market_products', 'package_price', $this->integer());
        $this->addColumn('market_products', 'tax', $this->integer());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('market_products', 'price');
        $this->dropColumn('market_products', 'discount');
        $this->dropColumn('market_products', 'status_existence');
        $this->dropColumn('market_products', 'details');
        $this->dropColumn('market_products', 'package_price');
        $this->dropColumn('market_products', 'tax');
    }
}
