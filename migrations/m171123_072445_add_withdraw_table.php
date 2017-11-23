<?php

use yii\db\Migration;
use yii\db\Schema;

/**
 * Class m171123_072445_add_withdraw_table
 */
class m171123_072445_add_withdraw_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {

        $this->createTable("withdraw", [
            "id" => $this->primaryKey(),
            "title" =>$this->string(25),
            "amount" => $this->integer(),
            "date"=> $this->date(),
            "received_by"=>$this->integer(),
            "description"=>$this->string(),
            "purpose"=>$this->string(25),
            "status"=>$this->boolean()->defaultValue(1)
        ]);

        // creates index for column `received_by`
        $this->createIndex(
            'idx-withdraw-received_by',
            'withdraw',
            'received_by'
        );

        // add foreign key for table `employee`
        $this->addForeignKey(
            'fk-withdraw-received_by',
            'withdraw',
            'received_by',
            'employee',
            'id',
            'CASCADE'
        );
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        // drops foreign key for table `user`
        $this->dropForeignKey(
            'fk-withdraw-received_by',
            'withdraw'
        );

        // drops index for column `received_by`
        $this->dropIndex(
            'idx-withdraw-received_by',
            'withdraw'
        );

        echo "m171123_072445_add_withdraw_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m171123_072445_add_withdraw_table cannot be reverted.\n";

        return false;
    }
    */
}
