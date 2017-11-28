<?php

use yii\db\Migration;

/**
 * Class m171128_063735_add_column_billno_in_expenses_table
 */
class m171128_063735_add_column_billno_in_expenses_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->addColumn('expenses','bill_no','string');
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        echo "m171128_063735_add_column_billno_in_expenses_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m171128_063735_add_column_billno_in_expenses_table cannot be reverted.\n";

        return false;
    }
    */
}
