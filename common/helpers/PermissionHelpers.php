<?php

namespace common\helpers;

use common\helpers\ValueHelpers;
use yii;
use yii\web\Controller;
use yii\helpers\Url;

/**
 * Description of PermissionHelpers
 *
 */
class PermissionHelpers {

    /**
     * 
     * @param string $user_type_name
     * @return string
     */
    public static function requireUpgradeTo($user_type_name) {

        if (!ValueHelpers::userTypeMatch($user_type_name)) {

            return Yii::$app->getResponse()->redirect(Url::to(['upgrade/index']));
        }
    }

    /**
     * 
     * @param string $status_name
     * @return mixed
     */
    public static function requireStatus($status_name) {

        return ValueHelpers::statusMatch($status_name);
    }

    /**
     * 
     * @param string $role_name
     * @return mixed
     */
    public static function requireRole($role_name) {

        return ValueHelpers::roleMatch($role_name);
    }

    /**
     * 
     * @param string $role_name
     * @param int $userId
     * @return boolean
     */
    public static function requireMinimumRole($role_name, $userId = null) {

        if (ValueHelpers::isRoleNameValid($role_name)) {

            if ($userId == null) {

                $userRoleValue = ValueHelpers::getUsersRoleValue();
            } else {

                $userRoleValue = ValueHelpers::getUsersRoleValue($userId);
            }

            return $userRoleValue >= ValueHelpers::getRoleValue($role_name) ? true : false;
        } else {

            return false;
        }
    }

    /**
     * 
     * @param string $model_name
     * @param int $model_id
     * @return boolean
     */
    public static function userMustBeOwner($model_name, $model_id) {

        $connection = \Yii::$app->db;
        $userid = Yii::$app->user->identity->id;
        $sql = "SELECT id FROM $model_name WHERE user_id=:userid AND id=:model_id";
        $command = $connection->createCommand($sql);
        $command->bindValue(":userid", $userid);
        $command->bindValue(":model_id", $model_id);

        if ($result = $command->queryOne()) {

            return true;
        } else {

            return false;
        }
    }

}
