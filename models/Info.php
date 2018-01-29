<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 28.08.2017
 * Time: 16:35
 */

namespace app\models;


use yii\base\Model;
use yii\db\ActiveRecord;

class Info extends ActiveRecord
{
    public static function tableName () {
        return 'info';
    }
}