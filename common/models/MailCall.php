<?php

namespace common\models;

use Yii;
use common\helpers\RecordHelpers;

/**
 * Description of MailCall
 *
 * @author jkofsky
 */
class MailCall {

    /**
     * 
     * @param int $message_id
     * @return bool
     */
    public static function sendTheMail($message_id) {
        return Yii::$app->mailer->compose()
                        ->setTo(\Yii::$app->user->identity->email)
                        ->setFrom(['no-reply@yii2build.com' => 'Yii 2 Build'])
                        ->setSubject(RecordHelpers::getMessageSubject($message_id))
                        ->setTextBody(RecordHelpers::getMessageBody($message_id))
                        ->send();
    }

    /**
     * 
     * @param string $action_name
     * @param string $controller_name
     */
    public static function onMailableAction($action_name, $controller_name) {
        if ($message_id = RecordHelpers::findStatusMessage($action_name, $controller_name)) {
            static::sendTheMail($message_id);
        }
    }

}
