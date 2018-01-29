<?php

use app\modules\admin\models\Categories;
use app\modules\admin\models\Tag;
use kartik\datecontrol\DateControl;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use vova07\imperavi\Widget;
use kartik\datetime\DateTimePicker;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Post */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="post-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <?= $form->field($model, 'autor')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'description')->textArea(['maxlength' => true, 'rows' => 6]) ?>

            <?= $form->field($model, 'content')->widget(Widget::className(), [
                'settings' => [
                    'lang' => 'ru',
                    'minHeight' => 200,
                    'imageUpload' => Url::to(['/admin/default/image-upload']),
                    'imageManagerJson' => Url::to(['/admin/default/images-get']),
                    'plugins' => [
                        'clips',
                        'fullscreen',
                        'imagemanager',
                    ]
                ]
            ]); ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3 col-sm-12 col-xs-12">
            <?= $form->field($model, 'date')->widget(DateControl::classname(), [
                'type'=>DateControl::FORMAT_DATETIME,
                'ajaxConversion' => true,
                'autoWidget' => true,
                'widgetClass' => '',
                'displayFormat' => 'php:d-F-Y',
                'saveFormat' => 'php:Y-m-d',
                'saveTimezone' => 'UTC',
                'displayTimezone' => 'Asia/Kolkata',

                'widgetOptions' => [
                    'pluginOptions' => [
                        'autoclose' => true,
                        'format' => 'php:d-F-Y'
                    ]
                ]
            ]);?>
        </div>
        <div class="col-md-3 col-sm-12 col-xs-12">
            <?= $form->field($model, 'cat_id')->dropDownList(ArrayHelper::map(Categories::find()->all(),'id', 'name'), ['prompt'=>'Select']) ?>
        </div>
        <div class="col-md-3 col-sm-12 col-xs-12">
            <?= $form->field($model, 'link')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-3 col-sm-12 col-xs-12">
            <?= $form->field($model, 'slug')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-6 col-sm-12 col-xs-12">
            <?= $form->field($model, 'newTags')->widget(Select2::className(),[
                'name' => 'color_2a',
                'value' => ArrayHelper::map(Tag::find()->all(), 'id', 'title'), // initial value (will be ordered accordingly and pushed to the top)
                'data' => ArrayHelper::map(Tag::find()->all(), 'id', 'title'),
                'maintainOrder' => true,
                'options' => ['placeholder' => 'Select a color ...', 'multiple' => true],
                'pluginOptions' => [
                    'tags' => true,
                    'maximumInputLength' => 10
                ],
            ]) ?>
        </div>
    </div>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
