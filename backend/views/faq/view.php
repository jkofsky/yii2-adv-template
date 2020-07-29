<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Faq */

$this->title = 'FAQ: ' . $model->faq_question;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Faqs'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="faq-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?=
        Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ])
        ?>
    </p>

    <?=
    DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'faq_question',
            'faq_answer',
            'faqCategory.faq_category_name',
            'faq_weight',
            ['attribute' => 'faq_is_featured', 'format' => 'boolean'],
            ['attribute' => 'createdByUsername', 'format' => 'raw'],
            ['attribute' => 'updatedByUsername', 'format' => 'raw'],
            'created_at:datetime',
            'updated_at:datetime',
        ],
    ])
    ?>

</div>
