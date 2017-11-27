<?php

use yii\db\Migration;

/**
 * Class m171127_060733_add_column_method
 */
class m171127_060733_add_column_method extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->addColumn('expenses','method','string');
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        echo "m171127_060733_add_column_method cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m171127_060733_add_column_method cannot be reverted.\n";

        return false;
    }
    */
}
