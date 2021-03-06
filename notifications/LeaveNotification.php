<?php
/**
 * Created by PhpStorm.
 * User: Binay
 * Date: 05/12/2017
 * Time: 13:24
 */

namespace app\notifications;

use Yii;
use webzop\notifications\Notification;

/**
 *Provides notification to admin on leave notice by employee
 */
class LeaveNotification extends Notification
{
    const LEAVE_NOTIFICATION = 'leave_notification';

    const CHECK = 'check';

    /**
     * Gets the notification title
     *
     * @return string
     */
    public $user;

    public function getTitle()
    {
        // TODO: Implement getTitle() method.
        switch($this->key){

            case self::LEAVE_NOTIFICATION:
                return Yii::t('app', 'New Leave notice');
        }
    }

    /**
     * Get the notification's delivery channels.
     * @return boolean
     */
    public function shouldSend($channel)
    {
        if($channel->id == 'screen'){
            if(in_array($this->key, [self::LEAVE_NOTIFICATION])){
                return true;
            }
        }
        return false;
    }

    /**
     * @inheritdoc
     */
    public function getRoute(){
        return ['/employee/leave-notice/index'];
    }
}