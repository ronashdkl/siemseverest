<?php

use yii\db\Migration;

/**
 * Class m171124_083505_remove_col_title_withdraw
 */
class m171124_083505_remove_col_title_withdraw extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->dropColumn('withdraw','title');
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        echo "m171124_083505_remove_col_title_withdraw cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m171124_083505_remove_col_title_withdraw cannot be reverted.\n";

        return false;
    }
    */
}
