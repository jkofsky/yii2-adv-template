<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\bootstrap\Collapse;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\ProfileSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Profiles');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="profile-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php
    echo Collapse::widget([
        'items' => [
            [
                'label' => 'Search',
                'content' => $this->render('_search', ['model' => $searchModel]),
            // use this to open its content by default
            //'contentOptions' => ['class' => 'in']
            ],
        ]
    ]);
    ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Profile'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            //'id',
            ['attribute' => 'profileIdLink', 'format' => 'raw'],
            ['attribute' => 'userLink', 'format' => 'raw'],
            // user_id,
            'first_name',
            'last_name',
            'birthdate:date',
            'genderName',
            // 'created_at',
            // 'updated_by',
            'updated_at:datetime',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]);
    ?>
</div>
