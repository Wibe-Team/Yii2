<?php

use app\modules\admin\models\Categories;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use kartik\file\FileInput;
use vova07\imperavi\Widget;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Post */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="container">
    <div class="row">
        <div class="col-md-5">
            <div class="post-form" style="margin-top: 100px">

                <?php $form = ActiveForm::begin(); ?>

                <?=  $form->field($model, 'image')->widget(FileInput::classname(), [
                    'options' => ['accept' => 'image/*'],
                ]); ?>

                <div class="form-group">
                    <?= Html::submitButton('Submit',  ['class' => 'btn btn-success' ]) ?>
                </div>

                <?php ActiveForm::end(); ?>

            </div>
        </div>
    </div>
</div>

