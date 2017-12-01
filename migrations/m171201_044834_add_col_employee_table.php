<?php

use yii\db\Migration;

/**
 * Class m171201_044834_add_col_employee_table
 */
class m171201_044834_add_col_employee_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->addColumn('employee','email','string');
        $this->addColumn('employee','joined_date','date');
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        echo "m171201_044834_add_col_employee_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m171201_044834_add_col_employee_table cannot be reverted.\n";

        return false;
    }
    */
}
