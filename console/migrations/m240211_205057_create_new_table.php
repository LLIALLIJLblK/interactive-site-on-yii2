<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%new}}`.
 */
class m240211_205057_create_new_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('priceList', [
            'id' => $this->primaryKey(),
            'rawTypeId' => $this->integer()->notNull(),
            'monthTypeId' => $this->integer()->notNull(),
            'tonnageTypeId' => $this->integer()->notNull(),
            'price' => $this->integer()->notNull(),
        ]);
        $this->batchInsert('priceList', ['rawTypeId', 'monthTypeId', 'tonnageTypeId', 'price'], [
            [1, 1, 1, 125],
            [1, 1, 2, 145],
            [1, 1, 3, 136],
            [1, 1, 4, 138],
            [1, 2, 1, 121],
            [1, 2, 2, 118],
            [1, 2, 3, 137],
            [1, 2, 4, 142],
            [1, 3, 1, 137],
            [1, 3, 2, 119],
            [1, 3, 3, 141],
            [1, 3, 4, 117],
            [1, 4, 1, 126],
            [1, 4, 2, 121],
            [1, 4, 3, 137],
            [1, 4, 4, 124],
            [1, 5, 1, 124],
            [1, 5, 2, 122],
            [1, 5, 3, 131],
            [1, 5, 4, 147],
            [1, 6, 1, 128],
            [1, 6, 2, 147],
            [1, 6, 3, 143],
            [1, 6, 4, 112],
            [2, 1, 1, 121],
            [2, 1, 2, 118],
            [2, 1, 3, 137],
            [2, 1, 4, 142],
            [2, 2, 1, 137],
            [2, 2, 2, 121],
            [2, 2, 3, 124],
            [2, 2, 4, 131],
            [2, 3, 1, 124],
            [2, 3, 2, 145],
            [2, 3, 3, 136],
            [2, 3, 4, 138],
            [2, 4, 1, 137],
            [2, 4, 2, 147],
            [2, 4, 3, 143],
            [2, 4, 4, 112],
            [2, 5, 1, 122],
            [2, 5, 2, 143],
            [2, 5, 3, 112],
            [2, 5, 4, 117],
            [2, 6, 1, 125],
            [2, 6, 2, 145],
            [2, 6, 3, 136],
            [2, 6, 4, 148],
            [3, 1, 1, 125],
            [3, 1, 2, 145],
            [3, 1, 3, 136],
            [3, 1, 4, 138],
            [3, 2, 1, 121],
            [3, 2, 2, 118],
            [3, 2, 3, 137],
            [3, 2, 4, 142],
            [3, 3, 1, 137],
            [3, 3, 2, 119],
            [3, 3, 3, 141],
            [3, 3, 4, 117],
            [3, 4, 1, 126],
            [3, 4, 2, 121],
            [3, 4, 3, 137],
            [3, 4, 4, 124],
            [3, 5, 1, 124],
            [3, 5, 2, 122],
            [3, 5, 3, 131],
            [3, 5, 4, 147],
            [3, 6, 1, 128],
            [3, 6, 2, 147],
            [3, 6, 3, 143],
            [3, 6, 4, 112],
        ]);

        $this->addForeignKey(
            'fk_priceList_rawType', 
            'priceList',
            'rawTypeId', 
            'rawTypes', 
            'id', 
            'CASCADE', 
            'CASCADE');

        $this->addForeignKey(
            'fk_priceList_monthType',
            'priceList',
            'monthTypeId',
            'monthType',
            'id',
            'CASCADE',
            'CASCADE');

        $this->addForeignKey(
            'fk_priceList_tonnageType',
            'priceList',
            'tonnageTypeId',
            'tonnageType',
            'id',
            'CASCADE',
            'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('priceList');
        return false;
    }
}
