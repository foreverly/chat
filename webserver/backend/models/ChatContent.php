<?php

namespace backend\models;

use Yii;
use backend\models\UserBackendModel as User;

/**
 * This is the model class for table "chat_content".
 *
 * @property string $id
 * @property integer $fromid
 * @property string $fromname
 * @property integer $toid
 * @property string $toname
 * @property string $content
 * @property integer $isread
 * @property integer $type
 * @property string $created_time
 */
class ChatContent extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'chat_content';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'fromid', 'fromname', 'toid', 'toname', 'content'], 'required'],
            [['id', 'fromid', 'toid', 'isread', 'type'], 'integer'],
            [['created_time'], 'safe'],
            [['fromname', 'toname'], 'string', 'max' => 128],
            [['content'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'fromid' => 'Fromid',
            'fromname' => 'Fromname',
            'toid' => 'Toid',
            'toname' => 'Toname',
            'content' => 'Content',
            'isread' => 'Isread',
            'type' => 'Type',
            'created_time' => 'Created Time',
        ];
    }

    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'fromid'])->select('user_backend.id,user_backend.display_name as fromname,user_backend.head_url');
    }
}
