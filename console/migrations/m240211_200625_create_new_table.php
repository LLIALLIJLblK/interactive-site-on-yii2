<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%new}}`.
 */
class m240211_200625_create_new_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('tonnageType', [
            'id' => $this->primaryKey(),
            'tonnage' => $this->integer()->notNull(),
        ]);

        $this->batchInsert('tonnageType', ['tonnage'], [
            [25],
            [50],
            [75],
            [100],
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('tonnageType');
    }
}
