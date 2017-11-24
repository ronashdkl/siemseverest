<?php

use yii\db\Migration;

/**
 * Class m171124_051127_add_column_status_to_income_table
 */
class m171124_051127_add_column_status_to_income_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->addColumn('incomes', 'status', $this->boolean()->after('description'));
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        echo "m171124_051127_add_column_status_to_income_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m171124_051127_add_column_status_to_income_table cannot be reverted.\n";

        return false;
    }
    */
}
