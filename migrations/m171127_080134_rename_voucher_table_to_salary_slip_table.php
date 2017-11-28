<?php

use yii\db\Migration;

/**
 * Class m171127_080134_rename_voucher_table_to_salary_slip_table
 */
class m171127_080134_rename_voucher_table_to_salary_slip_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->renameTable('voucher','salary_slip');
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        echo "m171127_080134_rename_voucher_table_to_salary_slip_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m171127_080134_rename_voucher_table_to_salary_slip_table cannot be reverted.\n";

        return false;
    }
    */
}
