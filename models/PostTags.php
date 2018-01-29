<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 05.09.2017
 * Time: 17:43
 */

namespace app\models;


use yii\db\ActiveRecord;

class PostTags extends ActiveRecord
{
    public static function tableName()
    {
        return 'post_tag';
    }
    public function getTag()
    {
        return $this->hasOne(Tags::className(), ['id' => 'tag_id']);
    }

    public function getPost()
    {
        return $this->hasOne(Tags::className(), ['id' => 'tag_id']);
    }
}