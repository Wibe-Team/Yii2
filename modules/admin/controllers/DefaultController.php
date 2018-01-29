<?php

namespace app\modules\admin\controllers;
use vova07\imperavi\actions\GetAction;
use yii\web\Controller;




/**
 * Default controller for the `admin` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }
    public function actions()
    {
        return [
            'image-upload' => [
                'class' => 'vova07\imperavi\actions\UploadAction',
                'url' => 'http://my-site.com/images/', // Directory URL address, where files are stored.
                'path' => '@app/web/img' // Or absolute path to directory where files are stored.
            ],
            'images-get' => [
                'class' => GetAction::className(),
                'url' => 'http://yii2.test/img', // URL адрес папки где хранятся изображения.
                'path' => '@app/web/img', // Или абсолютный путь к папке с изображениями.
                'type' => GetAction::TYPE_IMAGES,
            ],
        ];
    }
}
