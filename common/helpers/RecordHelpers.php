<?php

namespace common\helpers;

use yii;

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
        $sql = "SELECT id FROM $model_name WHERE user_id=:userid";
        $command = $connection->createCommand($sql);
        $command->bindValue(":userid", $userid);
        $result = $command->queryOne();

        if ($result == null) {

            return false;
        } else {

            return $result['id'];
        }
    }

}
