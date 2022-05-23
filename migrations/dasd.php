<?php

use yii\db\Migration;
//use yii\db\Query;
//use CDbMigration;
/**
 * Handles the creation of table `restaurants_food`.
 */
class m180627_122444_create_restaurants_food_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
//        $transaction=$this->getDbConnection()->beginTransaction();
//        try
//        {
        $connection = \Yii::$app->db;

        $transaction = $connection->beginTransaction();
        try {
            $connection->createCommand()
                ->createTable('restaurants_food', [
                    'id' => $this->primaryKey(),
                    'restaurant_id' => $this->integer()->notNull()  ,
                    'food_id' => $this->integer()->notNull(),
                ])->execute();

            $connection->createCommand()->
            createIndex(
                'idx-restaurant_food-restaurant_id',
                'restaurant_food',
                'restaurant_id'
            );
            $connection->createCommand()->addForeignKey(
                'fk-restaurant_food-restaurant_id',
                'restaurant_food',
                'restaurant_id',
                'restaurants',
                'id',
                'CASCADE'
            );
            $connection->createCommand()->createIndex(
                'idx-restaurant_food-food_id',
                'restaurant_food',
                'food_id'
            );
            $connection->createCommand()->addForeignKey(
                'fk-restaurant_food-food_id',
                'restaurant_food',
                'food_id',
                'food',
                'id',
                'CASCADE'
            );
            $transaction->commit();
        } catch(Exception $e) {
            $transaction->rollback();
        }

        /*
                    $this->createTable('restaurants_food', [
                        'id' => $this->primaryKey(),
                        'restaurant_id' => $this->integer()->notNull()  ,
                        'food_id' => $this->integer()->notNull(),

                    ]);
                    // creates index for column `restaurant_id`
                    $this->createIndex(
                        'idx-restaurant_food-restaurant_id',
                        'restaurant_food',
                        'restaurant_id'
                    );
                    // add foreign key for table `restaurant_photos`
                    $this->addForeignKey(
                        'fk-restaurant_food-restaurant_id',
                        'restaurant_food',
                        'restaurant_id',
                        'restaurants',
                        'id',
                        'CASCADE'
                    );
        //             creates index for column `food_id`
                    $this->createIndex(
                        'idx-restaurant_food-food_id',
                        'restaurant_food',
                        'food_id'
                    );
        //             add foreign key for table `restaurant_photos`
                    $this->addForeignKey(
                        'fk-restaurant_food-food_id',
                        'restaurant_food',
                        'food_id',
                        'food',
                        'id',
                        'CASCADE'
                    );

        */
        /*
//            $transaction->commit();
//        }
//        catch(Exception $e)
//        {
//            echo "Exception: ".$e->getMessage()."\n";
//            $transaction->rollback();
//            return false;
//        }


*/
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('restaurants_food');
    }
}
