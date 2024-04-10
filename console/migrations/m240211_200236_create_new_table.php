<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%new}}`.
 */
class m240211_200236_create_new_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('monthType', [
            'id' => $this->primaryKey(),
            'month' => $this->string()->notNull(),
        ]);

        $this->batchInsert('monthType', ['month'], [
            ['январь'],
            ['февраль'],
            ['август'],
            ['сентябрь'],
            ['октябрь'],
            ['ноябрь'],
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('monthType');
        return false;
    }
}
