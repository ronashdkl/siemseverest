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
                return Yii::t('app', 'Leave notice {user} created', ['user' => '#'.$this->user->id]);
        }
    }

    /**
     * Get the notification's delivery channels.
     * @return boolean
     */
    public function shouldSend($channel)
    {
        if($channel->id == 'screen'){
            if(!in_array($this->key, [self::CHECK])){
                return false;
            }
        }
        return true;
    }

    /**
     * @inheritdoc
     */
    public function getRoute(){
        return ['/modules/employee/leave-notice/index'];
    }
}