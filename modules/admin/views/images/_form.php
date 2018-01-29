<?php

use app\modules\admin\controllers\ImagesController;
use app\modules\admin\models\Imgcats;
use yii\helpers\Html;
use yii\web\UploadedFile;
use yii\widgets\ActiveForm;
use app\modules\admin\models\Images;
use kartik\file\FileInput;
use yii\helpers\ArrayHelper;


/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Images */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="images-form">
                <?php
                    //сохранение и обработка изображения
                    $model->createImg();
                ?>
                <?php $form = ActiveForm::begin(); ?>

                <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

                <div class="row">
                    <div class="col-md-6">
                        <?=  $form->field($model, 'imageFile')->widget(FileInput::classname(), [
                            'options' => ['accept' => 'image/*'],
                        ]); ?>
                    </div>
                    <div class="col-md-6">
                        <?= $form->field($model, 'idimage')->dropDownList(ArrayHelper::map(Imgcats::find()->all(),'id', 'name'), ['prompt'=>'Select']) ?>
                    </div>
                </div>
                <div class="form-group">
                    <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
                </div>

                <?php ActiveForm::end(); ?>

            </div>
        </div>
    </div>
</div>

