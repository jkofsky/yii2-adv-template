<?php

namespace backend\models;

use Yii;
use yii\db\ActiveRecord;
use common\models\User;
use backend\models\FaqCategory;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use yii\helpers\Html;

/**
 * This is the model class for table "{{%faq}}".
 *
 * @property integer $id
 * @property string $faq_question
 * @property string $faq_answer
 * @property integer $faq_category_id
 * @property integer $faq_is_featured
 * @property integer $faq_weight
 * @property integer $created_at
 * @property string $created_by
 * @property integer $updated_at
 * @property string $updated_by
 *
 * @property FaqCategory $faqCategory
 */
class Faq extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return '{{%faq}}';
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
            'blameable' => [
                'class' => 'yii\behaviors\BlameableBehavior',
                'createdByAttribute' => 'created_by',
                'updatedByAttribute' => 'updated_by',
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['faq_question', 'faq_answer'], 'required'],
            [['faq_category_id', 'faq_is_featured', 'faq_weight', 'created_by', 'updated_by'], 'integer'],
            [['faq_weight'], 'in', 'range' => range(1, 100)],
            ['faq_weight', 'default', 'value' => 100],
            [['created_at', 'updated_at'], 'safe'],
            [['faq_question'], 'string', 'max' => 255],
            [['faq_question'], 'unique'],
            [['faq_answer'], 'string', 'max' => 1055]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => Yii::t('app', 'ID'),
            'faq_question' => Yii::t('app', 'Question'),
            'faq_answer' => Yii::t('app', 'Answer'),
            'faq_category_id' => Yii::t('app', 'Category'),
            'faq_is_featured' => Yii::t('app', 'Featured?'),
            'faq_weight' => Yii::t('app', 'Weight'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'created_by' => Yii::t('app', 'Created By'),
            'updated_by' => Yii::t('app', 'Updated By'),
            'faqCategoryName' => Yii::t('app', 'Category'),
            'faqCategoryList' => Yii::t('app', 'Category'),
            'faqIsFeaturedName' => Yii::t('app', 'Featured'),
            'createdByUserName' => Yii::t('app', 'Created By'),
            'updatedByUserName' => Yii::t('app', 'Updated By'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFaqCategory() {
        return $this->hasOne(FaqCategory::className(), ['id' => 'faq_category_id']);
    }

    /**
     * usess magic getFaqCategoryName on return statement
     * @return string 
     */
    public function getFaqCategoryName() {
        return $this->faqCategory->faq_category_name;
    }

    /**
     * get list of FaqCategories for dropdown
     * @return array 
     */
    public static function getFaqCategoryList() {

        $droptions = FaqCategory::find()->asArray()->all();
        return Arrayhelper::map($droptions, 'id', 'faq_category_name');
    }

    /**
     * get list of FaqIsFeatured options for dropdown
     * @return array
     */
    public static function getFaqIsFeaturedList() {
        return $droptions = [0 => "No", 1 => "Yes"];
    }

    /**
     * 
     * @return string
     */
    public function getFaqIsFeaturedName() {
        return $this->faq_is_featured == 0 ? "No" : "Yes";
    }

    /**
     * 
     * @return \yii\db\ActiveQuery
     */
    public function getCreatedByUser() {
        return $this->hasOne(User::className(), ['id' => 'created_by']);
    }

    /**
     * @getCreatedByUsername
     * @return string 
     */
    public function getCreatedByUsername() {
        return $this->createdByUser ? $this->createdByUser->username : Yii::t('app', '- no user -');
    }

    /**
     * 
     * @return \yii\db\ActiveQuery
     */
    public function getUpdatedByUser() {
        return $this->hasOne(User::className(), ['id' => 'updated_by']);
    }

    /**
     * @getUpdateUserName
     * @return string 
     */
    public function getUpdatedByUsername() {
        return $this->updatedByUser ? $this->updatedByUser->username : Yii::t('app', '- no user -');
    }

}
