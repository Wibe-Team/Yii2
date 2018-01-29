<?php

/* @var $this yii\web\View */

use yii\helpers\Url;

$this->title = 'My Yii Application';
?>
<div id="headerwrap">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2">
                <h3><?= $queryInfo->site_name ?></h3>
                <h1><?= $queryInfo->site_name ?></h1>
                <h5><?= $queryInfo->description ?></h5>
            </div>
            <div class="col-lg-8 col-lg-offset-2 himg">
                <?php if(!empty($queryImgCats)): ?>
                    <?php foreach ($queryImgCats->images as $imgCats):?>
                        <img src="<?= $imgCats->getImage() ?>" alt="<?= $imgCats->title ?>">
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div><!-- /row -->
    </div> <!-- /container -->
</div><!-- /headerwrap -->

<!-- *****************************************************************************************************************
 SERVICE LOGOS
 ***************************************************************************************************************** -->
<div id="service">
    <div class="container">
        <div class="row centered">
            <?php if(!empty($cats)): ?>
                <?php foreach ($cats->posts as $post):?>
                    <div class="col-md-4">
                        <i class="<?= $post->title ?>"></i>
                        <h4><?= $post->description ?></h4>
                        <?= $post->content ?>
                        <p><br/><a href="<?= Url::to(['post/view', 'id'=>$post->id]) ?>" class="btn btn-theme">More Info</a></p>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div><! --/container -->
</div><! --/service -->

<!-- *****************************************************************************************************************
 PORTFOLIO SECTION
 ***************************************************************************************************************** -->
<div id="portfoliowrap">
    <?php if(!empty($portfolio)): ?>
    <h3><?= $portfolio->name ?></h3>
    <div class="portfolio-centered">
        <div class="recentitems portfolio">
                <?php foreach ($portfolio->posts as $post):?>
                    <div class="portfolio-item <?php foreach ($post->tags as $tag) {
                                                        echo ' ';
                                                        echo  $tag->title;
                                                    }
                                                 ?>">
                        <div class="he-wrap tpl6">
                            <img src="<?= $post->getImage(); ?>" alt="">
                            <div class="he-view">
                                <div class="bg a0" data-animate="fadeIn">
                                    <h3 class="a1" data-animate="fadeInDown"><?= $post->title ?></h3>
                                    <a data-rel="prettyPhoto" href="<?= $post->getImage(); ?>" class="dmbutton a2" data-animate="fadeInUp"><i class="fa fa-search"></i></a>
                                    <a href="<?= Url::to(['portfolio/view', 'id'=>$post->id]) ?>" class="dmbutton a2"  data-animate="fadeInUp"><i class="fa fa-link"></i></a>
                                </div><!-- he bg -->
                            </div><!-- he view -->
                        </div><!-- he wrap -->
                    </div><!-- end col-12 -->
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
</div>
<!-- *****************************************************************************************************************
 MIDDLE CONTENT
 ***************************************************************************************************************** -->

<div class="container mtb">
    <div class="row">
        <div class="col-lg-4 col-lg-offset-1">
            <h4>More About Our Agency.</h4>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. </p>
            <p><br/><a href="about.html" class="btn btn-theme">More Info</a></p>
        </div>

        <div class="col-lg-3">
            <h4>Frequently Asked</h4>
            <div class="hline"></div>
            <p><a href="#">How cool is this theme?</a></p>
            <p><a href="#">Need a nice good-looking site?</a></p>
            <p><a href="#">Is this theme retina ready?</a></p>
            <p><a href="#">Which version of Font Awesome uses?</a></p>
            <p><a href="#">Free support is integrated?</a></p>
        </div>

        <div class="col-lg-3">
            <h4>Latest Posts</h4>
            <div class="hline"></div>
            <?php if(!empty($posts)): ?>
                <?php foreach ($posts as $post):?>
                        <p><a href="<?= Url::to(['post/view', 'id'=>$post->id]) ?>"><?= $post->title ?></a></p>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>

    </div><! --/row -->
</div><! --/container -->

<!-- *****************************************************************************************************************
 TESTIMONIALS
 ***************************************************************************************************************** -->
<div id="twrap">
    <div class="container centered">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2">
                <i class="fa fa-comment-o"></i>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
                <h4><br/>Marcel Newman</h4>
                <p>WEB DESIGNER - BLACKTIE.CO</p>
            </div>
        </div><! --/row -->
    </div><! --/container -->
</div><! --/twrap -->

<!-- *****************************************************************************************************************
 OUR CLIENTS
 ***************************************************************************************************************** -->
<div id="cwrap">
    <div class="container">
        <div class="row centered">
            <h3>OUR CLIENTS</h3>
            <div class="col-lg-3 col-md-3 col-sm-3">
                <img src="img/clients/client01.png" class="img-responsive">
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3">
                <img src="img/clients/client02.png" class="img-responsive">
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3">
                <img src="img/clients/client03.png" class="img-responsive">
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3">
                <img src="img/clients/client04.png" class="img-responsive">
            </div>
        </div><! --/row -->
    </div><! --/container -->
</div><! --/cwrap -->

