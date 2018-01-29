<?php

namespace app\modules\admin\models;

use app\components\GoodException;
use Yii;
use yii\base\ErrorException;

/**
 * This is the model class for table "categories".
 *
 * @property integer $id
 * @property string $name
 *
 * @property Post[] $posts
 */
class Categories extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'categories';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name','slug'], 'required'],
            [['name', 'slug'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'slug' => 'Slug',
            'name' => 'Name',
        ];
    }
    //поиск связанных постов в категории и вывод сообщения об ошибке при попытке удаления категории
    public function beforeDelete(){
        foreach($this->posts as $c) {
            if ($c !== 0) {
                throw new GoodException('Ой, Ошибочка', 'Невозможно удалить категорию содержащую посты.');
            }
        }
        return parent::beforeDelete();
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPosts()
    {
        return $this->hasMany(Post::className(), ['cat_id' => 'id']);
    }
}
