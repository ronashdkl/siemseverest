<?php

use yii\db\Migration;

/**
 * Class m171124_114114_add_col_to_voucher
 */
class m171124_114114_add_col_to_voucher extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->addColumn('salary-slip','tax_amount','integer');
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        echo "m171124_114114_add_col_to_voucher cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m171124_114114_add_col_to_voucher cannot be reverted.\n";

        return false;
    }
    */
}
