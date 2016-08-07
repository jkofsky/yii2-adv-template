<?php

namespace common\helpers;

use yii;
use backend\models\StatusMessage;

/**
 * Description of RecordHelpers
 *
 */
class RecordHelpers {

    /**
     * Checks whether or not the user has a record in the given Model
     * 
     * <pre><code>
     * <?php
     * If ($already_exists = RecordHelpers::userHas('profile') {
     *    // show profile with id with value of $already_exists
     * } else {
     *    // go to form to create profile
     * }
     * ?>
     * </code></pre>
     *
     * @param string $model_name
     * @return int|boolean
     */
    public static function userHas($model_name) {
        $connection = \Yii::$app->db;
        $userid = Yii::$app->user->identity->id;
        $sql = "SELECT id FROM {{%$model_name}} WHERE user_id=:userid";
        $command = $connection->createCommand($sql);
        $command->bindValue(":userid", $userid);
        $result = $command->queryOne();

        if ($result == null) {

            return false;
        } else {

            return $result['id'];
        }
    }

    /**
     * Discover if an Autoresonder mesage is available for the requested
     * controller/action.
     * 
     * @param string $action_name
     * @param string $controller_name
     * @return int|bool
     */
    public static function findStatusMessage($action_name, $controller_name) {
        $result = StatusMessage::find('id')
                ->where(['action_name' => $action_name])
                ->andWhere(['controller_name' => $controller_name])
                ->one();
        return isset($result['id']) ? $result['id'] : false;
    }

    /**
     * Get Autoresponder message Subject
     *  
     * @param int $id Status Message ID number
     * @return string|bool
     */
    public static function getMessageSubject($id) {

        $result = StatusMessage::find('subject')
                ->where(['id' => $id])
                ->one();

        return isset($result['subject']) ? $result['subject'] : false;
    }

    /**
     * Get Autoresponder message Body
     *  
     * @param int $id Status Message ID number
     * @return string|bool
     */
    public static function getMessageBody($id) {

        $result = StatusMessage::find('body')
                ->where(['id' => $id])
                ->one();

        return isset($result['body']) ? $result['body'] : false;
    }

}
