<?php

use yii\db\Migration;

/**
 * Handles the creation of table `salary-slip`.
 */
class m171127_081740_create_voucher_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('voucher', [
            'id' => $this->primaryKey(),
            'amount' => $this->integer(),
            'date' => $this->dateTime(),
            'paid_to' => $this->text(),
            'account_of' => $this->text(),
            'accountant' => $this->integer(),
            'approved_by' => $this->integer(),
            'information' => $this->text(),
        ]);

        // creates index for column `accountant`
        $this->createIndex(
            'idx-voucher-accountant',
            'voucher',
            'accountant'
        );

        // add foreign key for table `employee`
        $this->addForeignKey(
            'fk-voucher-accountant',
            'voucher',
            'accountant',
            'employee',
            'user_id',
            'CASCADE'
        );

        // creates index for column `approved_by`
        $this->createIndex(
            'idx-voucher-approved_by',
            'voucher',
            'approved_by'
        );

        // add foreign key for table `employee`
        $this->addForeignKey(
            'fk-voucher-approved_by',
            'voucher',
            'approved_by',
            'employee',
            'user_id',
            'CASCADE'
        );
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('voucher');
    }
}
