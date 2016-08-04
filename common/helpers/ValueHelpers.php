<?php

/**
 * Description of ValueHelpers
 *
 */

namespace common\helpers;

use yii;
use backend\models\Role;
use backend\models\Status;
use backend\models\UserType;
use common\models\User;

class ValueHelpers {

    /**
     * 
     * @param string $role_name
     * @return boolean
     */
    public static function roleMatch($role_name) {

        $userHasRoleName = Yii::$app->user->identity->role->role_name;

        return (strcasecmp($role_name, $userHasRoleName) == 0);
    }

    /**
     * 
     * @param int $userId
     * @return int|boolean
     */
    public static function getUsersRoleValue($userId = null) {

        if ($userId == null) {

            $usersRoleValue = Yii::$app->user->identity->role->role_value;

            return isset($usersRoleValue) ? $usersRoleValue : false;
        } else {

            $user = User::findOne($userId);

            $usersRoleValue = $user->role->role_value;

            return isset($usersRoleValue) ? $usersRoleValue : false;
        }
    }

    /**
     * 
     * @param string $role_name
     * @return int|boolean
     */
    public static function getRoleValue($role_name) {

        $role = Role::find('role_value')
                ->where(['role_name' => $role_name])
                ->one();

        return isset($role->role_value) ? $role->role_value : false;
    }

    /**
     * 
     * @param string $role_name
     * @return boolean
     */
    public static function isRoleNameValid($role_name) {

        $role = Role::find('role_name')
                ->where(['role_name' => $role_name])
                ->one();

        return isset($role->role_name) ? true : false;
    }

    /**
     * 
     * @param string $status_name
     * @return boolean
     */
    public static function statusMatch($status_name) {

        $userHasStatusName = Yii::$app->user->identity->status->status_name;

        return $userHasStatusName == $status_name ? true : false;
    }

    /**
     * 
     * @param string $status_name
     * @return int|boolean
     */
    public static function getStatusId($status_name) {

        $status = Status::find('id')
                ->where(['status_name' => $status_name])
                ->one();

        return isset($status->id) ? $status->id : false;
    }

    /**
     * 
     * @param string $user_type_name
     * @return boolean
     */
    public static function userTypeMatch($user_type_name) {

        $userHasUserTypeName = Yii::$app->user->identity->userType->user_type_name;

        return $userHasUserTypeName == $user_type_name ? true : false;
    }

}
