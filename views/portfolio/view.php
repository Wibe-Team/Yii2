<?php

/* @var $this yii\web\View */

use yii\helpers\Url;

$this->title = 'My single project';
?>
<!-- *****************************************************************************************************************
 TITLE & CONTENT
 ***************************************************************************************************************** -->

<div class="container mt">
    <div class="row">
        <div class="col-lg-10 col-lg-offset-1 centered">
            <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                <!-- Indicators -->
                <ol class="carousel-indicators">
                    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                </ol>

                <!-- Wrapper for slides -->
                <div class="carousel-inner">
                    <div class="item active">
                        <img src="<?php $post->getImage(); ?>" alt="">
                    </div>
                    <div class="item">
                        <img src="assets/img/portfolio/single02.jpg" alt="">
                    </div>
                    <div class="item">
                        <img src="assets/img/portfolio/single03.jpg" alt="">
                    </div>
                </div>
            </div><! --/Carousel -->
        </div>

        <div class="col-lg-5 col-lg-offset-1">
            <div class="spacing"></div>
            <h4><?= $post->title ?></h4>
            <?= $post->content ?>
        </div>

        <div class="col-lg-4 col-lg-offset-1">
            <div class="spacing"></div>
            <h4>Детали проекта</h4>
            <div class="hline"></div>
            <p><b>Дата:</b><?= $post->date ?></p>
            <p><b>Автор:</b><?= $post->autor ?></p>
            <p><b>Категория: <?= $post->cat->name ?>
            <p><b>Теги:<?php foreach ($post->tags as $tag): ?>
                            <span><?= $tag->title ?>,</span>
                         <?php endforeach; ?>
            <p><b>Website:</b> <a href="<?php $post->link ?>"><?= $post->link ?></a></p>
        </div>

    </div><! --/row -->
</div><! --/container -->

<!-- *****************************************************************************************************************
 PORTFOLIO SECTION
 ***************************************************************************************************************** -->
<div id="portfoliowrap">
    <?php if(!empty($query)): ?>
    <h3>Похожие работы</h3>
    <div class="portfolio-centered">
        <div class="recentitems portfolio">
            <?php foreach ($query as $post):?>
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
</div><!-- portfolio -->


<!-- *****************************************************************************************************************
 FOOTER
 ***************************************************************************************************************** -->

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->


<script>
  // Portfolio
  (function($) {
    "use strict";
    var $container = $('.portfolio'),
      $items = $container.find('.portfolio-item'),
      portfolioLayout = 'fitRows';

    if( $container.hasClass('portfolio-centered') ) {
      portfolioLayout = 'masonry';
    }

    $container.isotope({
      filter: '*',
      animationEngine: 'best-available',
      layoutMode: portfolioLayout,
      animationOptions: {
        duration: 750,
        easing: 'linear',
        queue: false
      },
      masonry: {
      }
    }, refreshWaypoints());

    function refreshWaypoints() {
      setTimeout(function() {
      }, 1000);
    }

    $('nav.portfolio-filter ul a').on('click', function() {
      var selector = $(this).attr('data-filter');
      $container.isotope({ filter: selector }, refreshWaypoints());
      $('nav.portfolio-filter ul a').removeClass('active');
      $(this).addClass('active');
      return false;
    });

    function getColumnNumber() {
      var winWidth = $(window).width(),
        columnNumber = 1;

      if (winWidth > 1200) {
        columnNumber = 5;
      } else if (winWidth > 950) {
        columnNumber = 4;
      } else if (winWidth > 600) {
        columnNumber = 3;
      } else if (winWidth > 400) {
        columnNumber = 2;
      } else if (winWidth > 250) {
        columnNumber = 1;
      }
      return columnNumber;
    }

    function setColumns() {
      var winWidth = $(window).width(),
        columnNumber = getColumnNumber(),
        itemWidth = Math.floor(winWidth / columnNumber);

      $container.find('.portfolio-item').each(function() {
        $(this).css( {
          width : itemWidth + 'px'
        });
      });
    }

    function setPortfolio() {
      setColumns();
      $container.isotope('reLayout');
    }

    $container.imagesLoaded(function () {
      setPortfolio();
    });

    $(window).on('resize', function () {
      setPortfolio();
    });
  })(jQuery);
</script>
