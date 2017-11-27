<?php

use yii\db\Migration;

/**
 * Class m171127_074307_add_column_paidTo_in_expenses
 */
class m171127_074307_add_column_paidTo_in_expenses extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->addColumn('expenses','paid_to','string');
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        echo "m171127_074307_add_column_paidTo_in_expenses cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m171127_074307_add_column_paidTo_in_expenses cannot be reverted.\n";

        return false;
    }
    */
}
