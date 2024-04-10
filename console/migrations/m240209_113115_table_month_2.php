<?php

use yii\db\Migration;

/**
 * Class m240209_113115_table_month_2
 */
class m240209_113115_table_month_2 extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable(
            'month2',
            [
                'id' => $this->primaryKey(),
                'month' => $this-> string(20),
            ]
        );
        
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('month2');
        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m240209_113115_table_month_2 cannot be reverted.\n";

        return false;
    }
    */
}
