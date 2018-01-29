<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

use yii\helpers\Html;

$this->title = $name;
?>

<?php $this->beginContent('@app/modules/admin/views/layouts/admin.php'); ?>
    <div class="container" style="margin-top: 100px; margin-bottom: 100px;">
        <div class="row">
            <div class="col-md-12">
                <div class="site-error">

                    <h1><?= Html::encode($this->title) ?></h1>

                    <div class="alert alert-danger">
                        <h3><?= nl2br(Html::encode($message)) ?></h3>
                    </div>
                    <a href="http://yii2.test/admin/categories"><i class="fa fa-arrow-left" aria-hidden="true"></i>  Вернуться к редактированию категорий </a>
                    <p>
                        The above error occurred while the Web server was processing your request.
                    </p>
                    <p>
                        Please contact us if you think this is a server error. Thank you.
                    </p>

                </div>
            </div>
        </div>
    </div>
<?php $this->endContent(); ?>