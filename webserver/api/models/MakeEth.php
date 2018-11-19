<?php

namespace api\models;

use Yii;

/**
 * This is the model class for table "make_eth".
 *
 * @property string $id
 * @property string $email
 * @property string $eth
 * @property string $make_eth
 * @property string $request_time
 * @property string $created_time
 */
class MakeEth extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'make_eth';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['email', 'eth', 'make_eth'], 'required'],
            [['request_time', 'created_time'], 'safe'],
            ['email', 'email'],
            ['make_eth', 'unique'],
            [['email', 'eth'], 'string', 'max' => 255],
            [['make_eth'], 'string', 'max' => 128],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'email' => '邮箱',
            'eth' => 'ETH',
            'make_eth' => '生成链接',
            'request_time' => '请求时间',
            'created_time' => '生成时间',
        ];
    }
}
