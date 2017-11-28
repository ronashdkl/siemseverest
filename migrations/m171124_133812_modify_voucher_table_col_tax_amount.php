<?php

use yii\db\Migration;

/**
 * Class m171124_133812_modify_voucher_table_col_tax_amount
 */
class m171124_133812_modify_voucher_table_col_tax_amount extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
    $this->dropColumn('salary-slip','tax_amount');
    $this->addColumn('salary-slip','tax_amount','float');
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        echo "m171124_133812_modify_voucher_table_col_tax_amount cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m171124_133812_modify_voucher_table_col_tax_amount cannot be reverted.\n";

        return false;
    }
    */
}
