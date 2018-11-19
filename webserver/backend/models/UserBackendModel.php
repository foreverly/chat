<?php

namespace backend\models;
use yii\web\IdentityInterface;

use Yii;

/**
 * This is the model class for table "user_backend".
 *
 * @property string $id
 * @property string $username
 * @property string $display_name
 * @property string $real_name
 * @property string $password
 * @property string $mobile
 * @property integer $login_num
 * @property string $login_ip
 * @property string $login_time
 * @property integer $user_group
 * @property string $updated_by
 * @property string $updated_at
 * @property integer $status
 * @property string $email
 * @property string $auth_key
 * @property string $password_hash
 * @property string $password_reset_token
 * @property integer $role
 * @property integer $created_at
 */
class UserBackendModel extends \yii\db\ActiveRecord implements IdentityInterface
{

    const STATUS_DELETED = 0;
    const STATUS_ACTIVE = 10;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user_backend';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username', 'user_group', 'email'], 'required'],
            [['login_num', 'user_group', 'status', 'role', 'created_at'], 'integer'],
            [['login_time', 'updated_at'], 'safe'],
            [['username', 'display_name', 'real_name'], 'string', 'max' => 50],
            [['password', 'email', 'password_hash', 'password_reset_token'], 'string', 'max' => 255],
            [['mobile'], 'string', 'max' => 20],
            [['login_ip', 'updated_by'], 'string', 'max' => 40],
            [['auth_key'], 'string', 'max' => 32],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => '用户名',
            'display_name' => 'Display Name',
            'real_name' => 'Real Name',
            'password' => '密码',
            'mobile' => '手机',
            'login_num' => '登陆次数',
            'login_ip' => '登陆Ip',
            'login_time' => '登陆时间',
            'user_group' => '用户组',
            'updated_by' => 'Updated By',
            'updated_at' => 'Updated At',
            'status' => 'Status',
            'email' => 'Email',
            'auth_key' => '自动登录key',
            'password_hash' => '加密密码',
            'password_reset_token' => '重置密码token',
            'role' => 'Role',
            'created_at' => '创建时间',
        ];
    }

    /**
     * @inheritdoc
     * 根据user_backend表的主键（id）获取用户
     */
    public static function findIdentity($id)
    {
        return static::findOne(['id' => $id]);
    }

    /**
     * @inheritdoc
     * 根据user_backend表的主键（id）获取用户名称
     */
    public static function getName($id)
    {
        $info = static::findOne(['id' => $id]);
        return $info->display_name;
    }

    /**
     * @inheritdoc
     * 根据access_token获取用户，参看http://www.manks.top/yii2-restful-api.html
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        throw new NotSupportedException('"findIdentityByAccessToken" is not implemented.');
    }

    /**
     * @inheritdoc
     * 用以标识 Yii::$app->user->id 的返回值
     */
    public function getId()
    {
        return $this->getPrimaryKey();
    }

    /**
     * @inheritdoc
     * 获取auth_key
     */
    public function getAuthKey()
    {
        return $this->auth_key;
    }

    /**
     * @inheritdoc
     * 验证auth_key
     */
    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        return static::findOne(['username' => $username, 'status' => self::STATUS_ACTIVE]);
    }

    /**
     * Finds user by password reset token
     *
     * @param string $token password reset token
     * @return static|null
     */
    public static function findByPasswordResetToken($token)
    {
        if (!static::isPasswordResetTokenValid($token)) {
            return null;
        }

        return static::findOne([
            'password_reset_token' => $token,
            'status' => self::STATUS_ACTIVE,
        ]);
    }

    /**
     * Finds out if password reset token is valid
     *
     * @param string $token password reset token
     * @return bool
     */
    public static function isPasswordResetTokenValid($token)
    {
        if (empty($token)) {
            return false;
        }

        $timestamp = (int) substr($token, strrpos($token, '_') + 1);
        $expire = Yii::$app->params['user.passwordResetTokenExpire'];
        return $timestamp + $expire >= time();
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return Yii::$app->security->validatePassword($password, $this->password_hash);
    }

    /**
     * 为model的password_hash字段生成密码的hash值
     *
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password_hash = Yii::$app->security->generatePasswordHash($password);
    }

    /**
     * 生成 "remember me" 认证 key
     */
    public function generateAuthKey()
    {
        $this->auth_key = Yii::$app->security->generateRandomString();
    }

    /**
     * Generates new password reset token
     */
    public function generatePasswordResetToken()
    {
        $this->password_reset_token = Yii::$app->security->generateRandomString() . '_' . time();
    }

    /**
     * Removes password reset token
     */
    public function removePasswordResetToken()
    {
        $this->password_reset_token = null;
    }
}
