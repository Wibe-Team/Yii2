<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "info".
 *
 * @property integer $id
 * @property string $site_name
 * @property string $description
 * @property integer $phone
 * @property string $email
 */
class Info extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'info';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['site_name'], 'required'],
            [['phone'], 'integer'],
            [['site_name'], 'string', 'max' => 100],
            [['description'], 'string', 'max' => 150],
            [['email'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'site_name' => 'Site Name',
            'description' => 'Description',
            'phone' => 'Phone',
            'email' => 'Email',
        ];
    }
}
