<?php

namespace api\models;

use Yii;

/**
 * This is the model class for table "node".
 *
 * @property string $id
 * @property string $nick_name
 * @property string $email
 * @property string $eth
 * @property string $source
 * @property string $request_time
 * @property string $created_time
 */
class Node extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'node';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nick_name', 'email', 'eth'], 'required'],
            [['request_time', 'created_time'], 'safe'],
            ['email', 'email'],
            ['eth', 'unique'],
            [['nick_name', 'email', 'eth', 'source'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nick_name' => '社群昵称',
            'email' => '邮箱',
            'eth' => '转账地址',
            'source' => '来源',
            'request_time' => '请求时间',
            'created_time' => '创建时间',
        ];
    }
}
