<?php

use yii\db\Migration;

/**
 * Class m171124_065735_add_balance_table
 */
class m171124_065735_add_balance_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->createTable("balance", [
            "id" => $this->primaryKey(),
            "bank_amount" => $this->integer(),
            "cash_amount"=> $this->integer(),
            "ref_id"=>$this->string(),
        ]);

        $this->insert('balance',[
            "bank_amount"=>"0",
            "cash_amount"=>"0",
            "ref_id"=>"{\"table\":\"intial\",\"id\":0}"
        ]);
        $this->insert('balance',[
            "bank_amount"=>"10000",
            "cash_amount"=>"10000",
            "ref_id"=>"{\"table\":\"intial\",\"id\":1}"
        ]);
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        echo "m171124_065735_add_balance_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m171124_065735_add_balance_table cannot be reverted.\n";

        return false;
    }
    */
}
