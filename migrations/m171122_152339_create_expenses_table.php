<?php

use yii\db\Migration;

/**
 * Handles the creation of table `expenses`.
 */
class m171122_152339_create_expenses_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('expenses', [
            'id' => $this->primaryKey(),
            'title' => $this->string()->notNull(),
            'amount' => $this->integer(),
            'date' => $this->dateTime(),
            'description' => $this->text(),
            'status' => $this->integer(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('expenses');
    }
}
