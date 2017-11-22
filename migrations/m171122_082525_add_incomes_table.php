<?php
use yii\db\Schema;
use yii\db\Migration;

/**
 * Class m171122_082525_add_incomes_table
 */
class m171122_082525_add_incomes_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->createTable("incomes", [
            "id" => Schema::TYPE_PK,
            "amount" => Schema::TYPE_INTEGER,
            "source" => Schema::TYPE_STRING,
            "date" => Schema::TYPE_DATETIME,
            "received_by" => Schema::TYPE_STRING,
            "description" => Schema::TYPE_TEXT,
        ]);
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        echo "m171122_082525_add_incomes_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m171122_082525_add_incomes_table cannot be reverted.\n";

        return false;
    }
    */
}
