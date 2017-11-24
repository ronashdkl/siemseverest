<?php

use yii\db\Migration;

/**
 * Class m171124_074507_remove_fk_withdraw_table
 */
class m171124_074507_remove_fk_withdraw_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->dropForeignKey('fk-withdraw-received_by','withdraw');
        $this->alterColumn('withdraw','received_by','string');
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        echo "m171124_074507_remove_fk_withdraw_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m171124_074507_remove_fk_withdraw_table cannot be reverted.\n";

        return false;
    }
    */
}
