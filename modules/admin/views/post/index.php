<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\models\PostSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
?>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <?php $this->title = 'Posts';
            $this->params['breadcrumbs'][] = $this->title; ?>
            <div class="post-index">

                <h1><?= Html::encode($this->title) ?></h1>
                <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

                <p>
                    <?= Html::a('Create Post', ['create'], ['class' => 'btn btn-success']) ?>
                </p>

                <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    'filterModel' => $searchModel,
                    'columns' => [
                        ['class' => 'yii\grid\SerialColumn'],

                        'id',
                        'title',
                        'slug',
                        'autor',
                        'date',
                        'link',
                        'description',
                        [
                            'attribute' => 'tag_id',
                            'value' => function($data) {
                                foreach ($data->tags as $tag) {
                                    return $tag->title;
                                }
                            }
                        ],
                        [
                            'attribute' => 'cat_id',
                            'value' => 'cat.name',
                        ],
                        [
                            'format' => 'html',
                            'label' => 'Изображение',
                            'value' => function($data){
                                return Html::img($data->getImage(), ['width'=>200]);
                            }
                        ],

                        ['class' => 'yii\grid\ActionColumn'],
                    ],
                ]); ?>
            </div>
        </div>
    </div>
</div>

