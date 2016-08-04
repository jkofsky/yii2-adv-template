<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use common\helpers\PermissionHelpers;

/* @var $this yii\web\View */
/* @var $model common\models\Profile */

$this->title = Html::encode($model->user->username);

$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Profiles'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

$show_this_nav = PermissionHelpers::requireMinimumRole('SuperUser');
?>
<div class="profile-view">

    <h1>Profile: <?= Html::encode($this->title) ?></h1>

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
            ['attribute' => 'userLink', 'format' => 'raw'],
            'first_name',
            'last_name',
            'birthdate:date',
            'gender.gender_name',
            'created_at:datetime',
            'updated_at:datetime',
            'id',
        ],
    ])
    ?>

</div>
