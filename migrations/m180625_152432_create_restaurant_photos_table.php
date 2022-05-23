<?php

use yii\db\Migration;

/**
 * Handles the creation of table `restaurant_photos`.
 */
class m180625_152432_create_restaurant_photos_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('restaurant_photos', [
            'id' => $this->primaryKey(),
            'name' => $this->text(),
            'restaurant_id' => $this->integer()->notNull(),

        ]);
        // creates index for column `restaurant_id`
        $this->createIndex(
            'idx-restaurant_photos-restaurant_id',
            'restaurant_photos',
            'restaurant_id'
        );
        // add foreign key for table `restaurant_photos`
        $this->addForeignKey(
            'fk-restaurant_photos-restaurant_id',
            'restaurant_photos',
            'restaurant_id',
            'restaurants',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('restaurant_photos');
    }
}
