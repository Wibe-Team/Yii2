<?php

namespace app\controllers;

use app\models\Cats;
use app\models\Images;
use app\models\Imgcats;
use app\models\Info;
use app\models\Posts;
use app\models\Tags;
use Yii;
use yii\data\Pagination;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;


class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post','get'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        $query = Posts::find()->with('tags')->select('id, title, description')->orderBy('id DESC');
        $posts = $query->limit('5')->all();
        $queryPostCats = Cats::find()->with('posts.tags');
        $cats = $queryPostCats->where(['slug'=>'yii2'])->one();
        $portfolio = $queryPostCats->where(['slug'=>'portfolio'])->one();
        $queryImgCats = Imgcats::find()->with('images')->where(['slug'=>'header'])->one();
        $queryInfo = Info::find()->where(['id'=>'1'])->one();

        return $this->render('index', compact('posts', 'queryImgCats',
                                                        'queryInfo', 'cats','portfolio'));
    }
    public function actionView () {
        $id = \Yii::$app->request->get('id');
        $post = Posts::findOne($id);

        return $this->render('view', compact('post'));
    }
    public function actionAbout () {
        $id = \Yii::$app->request->get('id');
        $post = Posts::findOne($id);

        return $this->render('about', compact('post'));
    }
    public function actionContact () {
        $id = \Yii::$app->request->get('id');
        $post = Posts::findOne($id);

        return $this->render('contact', compact('post'));
    }
}
