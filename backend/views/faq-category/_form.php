<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\FaqCategory */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="faq-category-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'faq_category_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'faq_category_weight')->textInput() ?>

    <?= $form->field($model, 'faq_category_is_featured')->dropDownList($model->faqCategoryIsFeaturedList, [ 'prompt' => Yii::t('app','Please Choose One')]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
