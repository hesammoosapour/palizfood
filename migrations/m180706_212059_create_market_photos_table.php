<?php

use yii\db\Migration;

/**
 * Handles the creation of table `market_photos`.
 * Has foreign keys to the tables:
 *
 * - `markets`
 */
class m180706_212059_create_market_photos_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('market_photos', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'market_id' => $this->integer()->notNull(),
        ]);

        // creates index for column `market_id`
        $this->createIndex(
            'idx-market_photos-market_id',
            'market_photos',
            'market_id'
        );

        // add foreign key for table `markets`
        $this->addForeignKey(
            'fk-market_photos-market_id',
            'market_photos',
            'market_id',
            'markets',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `markets`
        $this->dropForeignKey(
            'fk-market_photos-market_id',
            'market_photos'
        );

        // drops index for column `market_id`
        $this->dropIndex(
            'idx-market_photos-market_id',
            'market_photos'
        );

        $this->dropTable('market_photos');
    }
}
