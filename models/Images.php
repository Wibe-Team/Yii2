<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "images".
 *
 * @property integer $id
 * @property string $title
 * @property string $image
 * @property integer $idimage
 *
 * @property Imgcats $idimage0
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

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['image', 'idimage'], 'required'],
            [['idimage'], 'integer'],
            [['title'], 'string', 'max' => 150],
            [['image'], 'string', 'max' => 50],
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
            'title' => 'Title',
            'image' => 'Image',
            'idimage' => 'Idimage',
        ];
    }
    public function getImage()
    {
        return ($this->image) ? \Yii::getAlias('@web') . '/img/' . $this->image : '/browser.png';
    }
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdimage0()
    {
        return $this->hasOne(Imgcats::className(), ['id' => 'idimage']);
    }
}
