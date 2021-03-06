<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\search\StatusMessageSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="status-message-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'controller_name') ?>

    <?= $form->field($model, 'action_name') ?>

    <?= $form->field($model, 'status_message_name') ?>

    <?= $form->field($model, 'subject') ?>

    <?php // echo $form->field($model, 'body') ?>

    <?php // echo $form->field($model, 'status_message_description') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updates_at') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
