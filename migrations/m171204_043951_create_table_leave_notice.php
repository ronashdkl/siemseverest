<?php

use yii\db\Migration;

/**
 * Class m171204_043951_create_table_leave_notice
 */
class m171204_043951_create_table_leave_notice extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->createTable('leave_notice', [
            'id' => $this->primaryKey(),
            'employee_id' => $this->integer(),
            'apply_date' => $this->dateTime(),
            'start_date' => $this->dateTime(),
            'subject' => $this->text(),
            'description' => $this->text(),
            'leave_days' => $this->integer(),
            'status' => $this->integer(),
            'file' => $this->text(),
        ]);

        // creates index for column `employee_id`
        $this->createIndex(
            'idx-leave_notice-employee_id',
            'leave_notice',
            'employee_id'
        );

        // add foreign key for table `employee`
        $this->addForeignKey(
            'fk-leave_notice-employee_id',
            'leave_notice',
            'employee_id',
            'employee',
            'user_id',
            'CASCADE'
        );
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        echo "m171204_043951_create_table_leave_notice cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m171204_043951_create_table_leave_notice cannot be reverted.\n";

        return false;
    }
    */
}
