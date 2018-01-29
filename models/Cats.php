<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 21.08.2017
 * Time: 8:30
 */

namespace app\models;


use yii\db\ActiveRecord;

class Cats extends ActiveRecord
{
    public static function tableName()
    {
        return 'categories';
    }
    public function getPosts()
    {
        return $this->hasMany(Posts::className(), ['cat_id' => 'id']);
    }
}