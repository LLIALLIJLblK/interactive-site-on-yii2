<?php

use yii\db\Migration;

/**
 * Class m240228_101644_create_table_history
 */
class m240228_101644_create_table_history extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('history', [
            'id' => $this->primaryKey(),
            'userId' => $this->integer()->notNull(),
            'raw' => $this->string(),
            'month' => $this->string(),
            'tonnage' => $this->integer(),
            'price' => $this->integer(),
        ]);
        $this->addForeignKey(
            'fk-history-userId',
            'history',
            'userId',
            'users',
            'id',
            'CASCADE'
        );

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m240228_101644_create_table_history cannot be reverted.\n";
        $this->dropTable('history');
        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m240228_101644_create_table_history cannot be reverted.\n";

        return false;
    }
    */
}
