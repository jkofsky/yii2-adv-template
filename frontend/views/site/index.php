<?php

use \yii\bootstrap\Alert;
use yii\helpers\Html;
use kartik\social\TwitterPlugin;

/* @var $this yii\web\View */

$this->title = 'My Yii2 Template';
?>
<div class="site-index">
    <?Php
    echo Alert::widget([
        'options' => [
            'class' => 'alert-danger',
        ],
        'body' => 'Information on this site is for <span style="font-weight:bolder;">Internal Use Only!</span>',
    ]);
    ?> 

    <div class="jumbotron">
        <?php
        if (Yii::$app->user->isGuest) {
            echo Html::a('Get Started Today', ['site/signup'], ['class' => 'btn btn-lg btn-success']);
        }
        ?>
        </p>

        <h1>Yii 2 Build</h1>

        <p class="lead">Use this Yii 2 Template to start Projects.</p>
        <br/>

        <?php
//        echo FacebookPlugin::widget(['type' => FacebookPlugin::LIKE, 'settings' => []]);
        ?> 
    </div>

    <div class="body-content">

        <div class="row">
            <div class="col-md-4">
                <div class="panel panel-default">
                    <div class="panel-heading">It's Free</div>
                    <div class="panel-body">
                        <p>
                            <?php
                            if (!Yii::$app->user->isGuest) {

                                echo Yii::$app->user->identity->username . ' is doing cool stuff. ';
                            }
                            ?> 
                            Starting with this free, open source Yii 2 template and it will save you 
                            a lot of time.  You can deliver projects to the customer quickly, with 
                            a  lot of boilerplate already taken care of for you, so you can concentrate 
                            on the complicated stuff.</p>
                        <p>
                            <a class="btn btn-default" href="http://www.yiiframework.com/doc-2.0/guide-index.html">Yii Documentation &raquo;</a>
                        </p>

                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <?php
                echo TwitterPlugin::widget([
                    'type' => TwitterPlugin::TIMELINE,
                    'screenName' => 'catcountry987',
                    'settings' => [
                        'widget-id' => '293376767144632320',
                        'size' => 'large'
                    ],
                        //'options' => [ 'width' => '100%']
                ]);
                ?>
            </div>
            <div class="col-md-4">
                <div class="panel panel-default">
                    <div class="panel-heading">Code Quick, Code Right!</div>
                    <div class="panel-body">

                        <p>Leverage the power of the awesome Yii 2 framework with this enhanced template.  
                            Based Yii 2's advanced template, you get a full frontend and backend 
                            implementation that features rich UI for backend management.
                        </p>

                        <p>
                            <a class="btn btn-default" href="http://www.yiiframework.com/extensions/">Yii Extensions &raquo;</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
