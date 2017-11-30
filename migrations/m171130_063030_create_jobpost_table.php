<?php

use yii\db\Migration;

/**
 * Handles the creation of table `jobpost`.
 */
class m171130_063030_create_jobpost_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('jobpost', [
            'id' => $this->primaryKey(),
            'job_post' => $this->text(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('jobpost');
    }
}
