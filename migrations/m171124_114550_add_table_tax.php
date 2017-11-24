<?php

use yii\db\Migration;

/**
 * Class m171124_114550_add_table_tax
 */
class m171124_114550_add_table_tax extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->createTable("tax", [
            "id" => $this->primaryKey(),
            "start_range" => $this->integer(),
            "end_range" => $this->integer(),
            "tax_perc" => $this->float()
        ]);

        $this->insert('tax',[
            "start_range"=>0,
            "end_range"=>25000,
            "tax_perc"=>0.075
        ]);

        $this->insert('tax',[
        "start_range"=>25000,
        "end_range"=>50000,
        "tax_perc"=>0.1
        ]);

        $this->insert('tax',[
        "start_range"=>50000,
        "end_range"=>75000,
        "tax_perc"=>0.2
         ]);
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        echo "m171124_114550_add_table_tax cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m171124_114550_add_table_tax cannot be reverted.\n";

        return false;
    }
    */
}
