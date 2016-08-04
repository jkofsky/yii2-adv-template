<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use common\helpers\PermissionHelpers;

/* @var $this yii\web\View */
/* @var $model common\models\User */

$this->title = Html::encode($model->username);
$show_this_nav = PermissionHelpers::requireMinimumRole('SuperUser');

$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Users'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?php
        if (!Yii::$app->user->isGuest && $show_this_nav) {
            echo Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']);
        }
        ?>
        <?php
        if (!Yii::$app->user->isGuest && $show_this_nav) {
            echo Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                    'method' => 'post',
                ],
            ]);
        }
        ?>
    </p>

    <?=
    DetailView::widget([
        'model' => $model,
        'attributes' => [
            ['attribute' => 'profileLink', 'format' => 'raw'],
            //'username',
            //'auth_key',
            //'password_hash',
            //'password_reset_token',
            'email:email',
            'roleName',
            'statusName',
            'userTypeName',
            'created_at:datetime',
            'updated_at:datetime',
            'id',
        ],
    ])
    ?>

</div>
