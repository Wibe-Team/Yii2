<?php

/* @var $this yii\web\View */

use yii\helpers\Url;
use app\components\categoriesWidget;
use app\components\recentPostWidget;

$this->title = 'My single post';
?>
<!-- *****************************************************************************************************************
	 BLOG CONTENT
	 ***************************************************************************************************************** -->

<div class="container mtb">
    <div class="row">

        <! -- SINGLE POST -->
        <div class="col-lg-8">
            <! -- Blog Post 1 -->
            <p><img class="img-responsive" src="<?= $post->getImage(); ?>"></p>
            <a href="single-post.html"><h3 class="ctitle"><?= $post->title; ?></h3></a>
            <p><csmall><?= $post->date; ?></csmall> | <csmall2>By: Admin - 3 Comments</csmall2></p>
            <?= $post->content; ?>
            <div class="spacing"></div>
            <h6>SHARE:</h6>
            <p class="share">
                <a href="#"><i class="fa fa-twitter"></i></a>
                <a href="#"><i class="fa fa-facebook"></i></a>
                <a href="#"><i class="fa fa-tumblr"></i></a>
                <a href="#"><i class="fa fa-google-plus"></i></a>
            </p>

        </div><! --/col-lg-8 -->


        <! -- SIDEBAR -->
        <div class="col-lg-4">
            <h4>Search</h4>
            <div class="hline"></div>
            <p>
                <br/>
                <input type="text" class="form-control" placeholder="Search something">
            </p>

            <div class="spacing"></div>

            <h4>Категории</h4>
            <div class="hline"></div>
                <?= categoriesWidget::widget() ?>
            <div class="spacing"></div>

            <h4>Последние записи</h4>
            <div class="hline"></div>
            <ul class="popular-posts">
                <?= recentPostWidget::widget(); ?>
            </ul>

            <div class="spacing"></div>

            <h4>Теги</h4>
            <div class="hline"></div>
            <p>
                <?php if(!empty($tags)): ?>
                    <?php foreach ($tags as $tag):?>
                        <a class="btn btn-theme" href="<?= Url::to(['post/tag', 'id'=>$tag->id]) ?>" role="button"><?= $tag->title ?></a>
                    <?php endforeach; ?>
                <?php endif; ?>
            </p>
        </div>
    </div><! --/row -->
</div><! --/container -->
