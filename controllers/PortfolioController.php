<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 30.08.2017
 * Time: 17:29
 */

namespace app\controllers;
use app\controllers\AppController;
use app\models\Cats;
use app\models\Posts;
use yii\helpers\ArrayHelper;


class PortfolioController extends AppController
{
    public function actionIndex()
    {
        $queryPostCats = Cats::find();
        $portfolio = $queryPostCats->where(['slug'=>'portfolio'])->one();
        return $this->render('index', compact('portfolio'));
    }
    public function actionView () {
        $id = \Yii::$app->request->get('id');
        $post = Posts::findOne($id);
        $tagsIdArr = [];
        foreach ($post->tags as $tag) {
            $tagsIdArr[] = $tag->id;
        }
        $query = Posts::find()
                ->joinWith('tags')
                ->where(['tag_id' => $tagsIdArr])
                ->all();
        return $this->render('view', compact('post','query'));
    }
}