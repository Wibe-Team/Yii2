<?php

namespace app\modules\admin\models;

use Yii;
use yii\web\UploadedFile;

/**
 * This is the model class for table "images".
 *
 * @property integer $id
 * @property string $title
 * @property string $image
 * @property integer $cat_img_id
 *
 * @property CatImg $catImg
 */
class Images extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'images';
    }
    public $imageFile;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idimage'], 'required'],
            [['idimage'], 'string'],
            [['title'], 'string', 'max' => 150],
            [['image'], 'string', 'max' => 150],
            [['imageFile'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg'],
            [['idimage'], 'exist', 'skipOnError' => true, 'targetClass' => Imgcats::className(), 'targetAttribute' => ['idimage' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Заголовок',
            'image' => 'Изображение',
            'imageFile' => 'Изображение',
            'idimage' => 'Категория изображения',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCatImg()
    {
        return $this->hasOne(Imgcats::className(), ['id' => 'idimage']);
    }

    //вызываем функцию в _form.php
    public function createImg()
    {
        if (Yii::$app->request->isPost) {
            $file = $this->imageFile = UploadedFile::getInstance($this, 'imageFile');
            $this->saveImage($this->uploadFile($file, $this->image));
        }
    }

    public function saveImage($filename)
    {
        $this->image = $filename;
        return $this->save(false);
    }

    public function getImage()
    {
        return ($this->image) ? \Yii::getAlias('@web') . '/img/' . $this->image : \Yii::getAlias('@web') . '/img/browser.png';
    }

    public function deleteImage()
    {
        $this->deleteCurrentImage($this->image);
    }

    public function uploadFile(UploadedFile $file, $currentImage)
    {
        $this->imageFile = $file;
        if($this->validate()) {
            $this->deleteCurrentImage($currentImage);
            return $this->saveImageUpload();
        }

    }
    private function getFolder ()
    {
        return \Yii::getAlias('@web') . 'img/';
    }
    private function generateFilename()
    {
        return strtolower(md5(uniqid($this->imageFile->baseName)) . '.' . $this->imageFile->extension);
    }

    public function deleteCurrentImage($currentImage)
    {
        if($this->fileExists($currentImage))
        {
            unlink($this->getFolder() . $currentImage);
        }
    }

    public function fileExists($currentImage)
    {
        if(!empty($currentImage) && $currentImage != null)
        {
            return file_exists($this->getFolder() . $currentImage);
        }
    }

    public function saveImageUpload()
    {
        $filename = $this->generateFilename();
        $this->imageFile->saveAs($this->getFolder() . $filename);
        return $filename;
    }
}
