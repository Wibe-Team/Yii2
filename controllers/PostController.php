<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 15.08.2017
 * Time: 14:30
 */

namespace app\controllers;
use app\models\Cats;
use app\models\Posts;
use app\models\Tags;
use yii\data\Pagination;


class PostController extends AppController
{
    /**
     * @return string
     */
    public function actionIndex () {
        $query = Posts::find()->select('id, title, description, content, date, image, cat_id')->orderBy('id DESC');
        $pages = new Pagination (['totalCount' => $query->count(), 'pageSize' => 5]);
        $posts = $query->offset($pages->offset)->limit($pages->limit)->all();
        $tags = Tags::find()->all();

        return $this->render('index', compact('posts','pages','tags'));
    }

    public function actionView () {
       $id = \Yii::$app->request->get('id');
        $post = Posts::findOne($id);
        $tags = Tags::find()->all();
        return $this->render('view', compact('post','tags'));
    }
    public function actionTag ()
    {
        $id = \Yii::$app->request->get('id');
        $tag = Tags::findOne($id);
        $tags = Tags::find()->all();
        return $this->render('tag', compact('tag','tags'));
    }
}