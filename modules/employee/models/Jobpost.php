<?php

namespace app\modules\employee\models;

use Yii;

/**
 * This is the model class for table "jobpost".
 *
 * @property integer $id
 * @property string $job_post
 */
class Jobpost extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'jobpost';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['job_post'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'job_post' => 'Job Post',
        ];
    }
}
