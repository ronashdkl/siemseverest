<?php

use yii\db\Migration;

/**
 * Class m171129_053617_add_column_voucher_id_in_expenses_table
 */
class m171129_053617_add_column_voucher_id_in_expenses_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->addColumn('expenses','voucher_id','integer');

        // creates index for column `voucher_id`
        $this->createIndex(
            'idx-expenses-voucher_id',
            'expenses',
            'voucher_id'
        );

        // add foreign key for table `voucher`
        $this->addForeignKey(
            'fk-expenses-voucher_id',
            'expenses',
            'voucher_id',
            'voucher',
            'id',
            'CASCADE'
        );
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        echo "m171129_053617_add_column_voucher_id_in_expenses_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m171129_053617_add_column_voucher_id_in_expenses_table cannot be reverted.\n";

        return false;
    }
    */
}
