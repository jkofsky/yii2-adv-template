<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\jui\DatePicker;

/* @var $this yii\web\View */
/* @var $model common\models\Profile */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="profile-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'first_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'last_name')->textInput(['maxlength' => true]) ?>

    <?=
    $form->field($model, 'birthdate')->widget(DatePicker::className(), ['clientOptions' => [
            'yearRange' => '-115:+0',
            'changeYear' => true]])
    ?>
    
    <?= $form->field($model, 'gender_id')->dropDownList($model->genderList, ['prompt' => 'Please Choose One']); ?>

    <div class="form-group">
        <?=
        Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') :
                        Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary'])
        ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
