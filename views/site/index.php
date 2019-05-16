<?php

/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>
<div class="site-index">

    <div class="jumbotron">


        <h1 style="margin-bottom: 50px">Добро пожаловать</h1>
        <?php
        echo \tugmaks\RssFeed\RssReader::widget([
            'channel'=>'https://news.tut.by/rss/all.rss',
            'pageSize' => 3,
            'itemView' => '@app/views/site/rss_news', //To set own viewFile set 'itemView'=>'@frontend/views/site/_rss_item'. Use $model var to access item properties
            'wrapTag' => 'div',
            'wrapClass' => 'rss-wrap',
        ]);
        ?>

    </div>
</div>
