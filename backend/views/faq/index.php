<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\bootstrap\Collapse;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\FaqSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Faqs');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="faq-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php
    echo Collapse::widget([
        'items' => [
            [
                'label' => Yii::t('app', 'Search'),
                'content' => $this->render('_search', ['model' => $searchModel]),
            // open its content by default
            //'contentOptions' => ['class' => 'in']
            ],
        ]
    ]);
    ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Faq'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'id',
            'faq_question',
            'faq_answer',
            ['attribute' => 'faqCategoryName', 'format' => 'raw'],
            'faq_weight',
            ['attribute' => 'faqIsFeaturedName', 'format' => 'raw'],
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]);
    ?>
</div>
