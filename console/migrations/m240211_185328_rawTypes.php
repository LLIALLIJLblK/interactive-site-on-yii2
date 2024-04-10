<?php

use yii\db\Migration;

/**
 * Class m240211_185328_rawTypes
 */
class m240211_185328_rawTypes extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('rawTypes',[
            'id'=> $this->primaryKey(),
            'rawtype' => $this->string(30)->notNull(),
        ]);
        $this->batchInsert('rawTypes',['rawtype'],[
            ['шрот'],
            ['жмых'],
            ['соя'],
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('rawTypes');
        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m240211_185328_rawTypes cannot be reverted.\n";

        return false;
    }
    */
}
