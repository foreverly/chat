<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property integer $id
 * @property string $username
 * @property string $auth_key
 * @property string $password_hash
 * @property string $password_reset_token
 * @property string $email
 * @property integer $role
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 */
class UserModel extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username', 'auth_key', 'password_hash', 'email', 'created_at', 'updated_at'], 'required'],
            [['role', 'status', 'created_at', 'updated_at'], 'integer'],
            [['username', 'password_hash', 'password_reset_token', 'email'], 'string', 'max' => 255],
            [['auth_key'], 'string', 'max' => 32],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => '自增ID',
            'username' => '用户名',
            'mobile' => '手机号',
            'real_name' => '姓名',
            'login_num' => '登录次数',
            'login_ip' => '最后登录IP',
            'login_time' => '最后登录时间',
            'auth_key' => '自动登录key',
            'password_hash' => '加密密码',
            'password_reset_token' => '重置密码token',
            'email' => '邮箱',
            'role' => '角色等级',
            'status' => '状态',
            'created_at' => '创建时间',
            'updated_at' => '最后登录时间',
        ];
    }

    public function getList($where = array()){
        
        $list = static::find()
        ->select("id,created_at")
        ->where($where)
        ->asArray()
        ->all();

        return $list;
    }

    public function getCount($where = array()){
        
        $res = static::find()
        ->select("count(0) as c")
        ->where($where)
        ->asArray()
        ->one();

        return $res['c'];
    }

    public function getData($start, $end){
        $where  = "created_at >=" . strtotime($start);
        $where .= " and created_at <=" . strtotime($end.' 23:59:59');
        
        $list = $this->getList($where);
        
        $tmp = [];
        foreach ($list as $key => $value) {

            $d = date('Y-m-d', $value['created_at']);

            $tmp[$d][] = $value;
        }

        $len = (strtotime($end) - strtotime($start))/86400;

        $total = $this->getCount('created_at < ' . strtotime($start));
        $data  = [];
        for ($i=0; $i <= $len; $i++) { 

            $date  = date('Y-m-d', strtotime($start) + $i * 86400);
            $count = isset($tmp[$date])?count($tmp[$date]):0;
            $total += $count;

            $data[$i]['date']  = $date;
            $data[$i]['add']   = $count;
            $data[$i]['total'] = $total;
        }
        
        ksort($data);

        return $data;
    }
}
