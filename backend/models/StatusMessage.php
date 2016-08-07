<?php

namespace backend\models;

use Yii;
use yii\db\ActiveRecord;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "{{%status_message}}".
 *
 * @property string $id
 * @property string $controller_name
 * @property string $action_name
 * @property string $status_message_name
 * @property string $subject
 * @property string $body
 * @property string $status_message_description
 * @property integer $created_at
 * @property integer $updated_at
 */
class StatusMessage extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return '{{%status_message}}';
    }

    /**
     * @inheritdoc
     */
    public function behaviors() {
        return [
            'timestamp' => [
                'class' => 'yii\behaviors\TimestampBehavior',
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['created_at', 'updated_at'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['updated_at'],
                ],
                'value' => null, // defaults to time(),
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['created_at', 'updated_at'], 'integer'],
            [['controller_name', 'action_name', 'status_message_name'], 'string', 'max' => 105],
            [['subject', 'status_message_description'], 'string', 'max' => 255],
            [['body'], 'string', 'max' => 2025],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => Yii::t('app', 'ID'),
            'controller_name' => Yii::t('app', 'Controller Name'),
            'action_name' => Yii::t('app', 'Action Name'),
            'status_message_name' => Yii::t('app', 'Status Message Name'),
            'subject' => Yii::t('app', 'Subject'),
            'body' => Yii::t('app', 'Body'),
            'status_message_description' => Yii::t('app', 'Status Message Description'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

}
