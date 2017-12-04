<?php

use yii\db\Migration;

/**
 * Handles the creation of table `attendence`.
 */
class m171204_045619_create_attendence_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('attendence', [
            'id' => $this->primaryKey(),
            'date'=>$this->date(),
            'attendence'=>$this->text(),
            'status'=>$this->boolean()
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('attendence');
    }
}
