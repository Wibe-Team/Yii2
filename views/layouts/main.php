<?php
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>

<?php $this->beginPage(); ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <?= Html::csrfMetaTags() ?>
    <link rel="shortcut icon" href="assets/ico/favicon.ico">

    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>

<body>
<?php $this->beginBody() ?>
<!-- Fixed navbar -->
<?php
NavBar::begin([
    'brandLabel' => 'My Company',
    'brandUrl' => Yii::$app->homeUrl,
    'options' => [
        'class' => 'navbar-default navbar-fixed-top',
    ],
]);
echo Nav::widget([
    'options' => ['class' => 'navbar-nav navbar-right'],
    'items' => [
        ['label' => 'ДОМАШНЯЯ', 'url' => ['/']],
        ['label' => 'О НАС', 'url' => ['/about']],
        ['label' => 'КОНТАКТЫ', 'url' => ['/contact']],
        ['label' => 'СТРАНИЦЫ',
            'url' => ['/contact'],
            'options' => ['class' => 'dropdown'],
            'items' => [
                ['label' => 'БЛОГ', 'url' => ['/post/']],
                ['label' => 'ПОРТФОЛИО', 'url' => ['/portfolio/']],
            ]
        ],
        Yii::$app->user->isGuest ? (
        ['label' => 'Login', 'url' => ['/admin']]
        ) : (
            '<li>'
            . Html::beginForm(['/site/logout'], 'post')
            . Html::submitButton(
                'Logout (' . Yii::$app->user->identity->username . ')',
                ['class' => 'btn btn-link logout']
            )
            . Html::endForm()
            . '</li>'
        )
    ],
]);
NavBar::end();
?>

<div class="contant">
    <?= $content ?>
</div>
<!-- *****************************************************************************************************************
	 FOOTER
	 ***************************************************************************************************************** -->
<div id="footerwrap">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <h4>About</h4>
                <div class="hline-w"></div>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</p>
            </div>
            <div class="col-lg-4">
                <h4>Social Links</h4>
                <div class="hline-w"></div>
                <p>
                    <a href="#"><i class="fa fa-dribbble"></i></a>
                    <a href="#"><i class="fa fa-facebook"></i></a>
                    <a href="#"><i class="fa fa-twitter"></i></a>
                    <a href="#"><i class="fa fa-instagram"></i></a>
                    <a href="#"><i class="fa fa-tumblr"></i></a>
                </p>
            </div>
            <div class="col-lg-4">
                <h4>Our Bunker</h4>
                <div class="hline-w"></div>
                <p>
                    Some Ave, 987,<br/>
                    23890, New York,<br/>
                    United States.<br/>
                </p>
            </div>

        </div><! --/row -->
    </div><! --/container -->
</div><! --/footerwrap -->
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>

