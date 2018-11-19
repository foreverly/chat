<?php

namespace api\modules\v1\controllers;

use Yii;
use yii\helpers\Json;
use yii\web\HeaderCollection;
use yii\rest\ActiveController;

/**
 * Default controller for the `v1` module
 */
class CommonController extends ActiveController
{

    public function init(){

        // $session = Yii::$app->session;

        // $session->set('user_base', $this->getHeaders());
    }
    
    public function failed($msg = ''){
        return [
            'code' => 0,
            'msg'  => $msg
        ];
    }    
    public function error($msg = ''){
        // throw new \yii\web\NotFoundHttpException($msg, 1);
        return [
            'code' => -1,
            'msg'  => $msg
        ];
    }

    public function success($data = array()){
        return [
            'code' => 200,
            'msg'  => 'success',
            'data' => $data
        ];
    }

    public function afterValidate ()
    {
        if ($this->hasErrors()) {
            $errors = $this->errors;
            $errors = current($errors);
            throw new \yii\web\NotFoundHttpException($errors[0], 1);
        }
        return true;
    }

    public function getModelError($model = null)
    {
        return !empty($model->getErrors()) ? current(current($model->getErrors())) : null;
    }

    public function getHeaders(){

        $request = Yii::$app->request;
        $data = [];
        if ($request) {
            $data = [
                'province'      => urldecode($request->getHeaders()->get('province', '')),// 省
                'city'          => urldecode($request->getHeaders()->get('city', '')), // 市
                'address'       => urldecode($request->getHeaders()->get('address', '')), // 市
                'long'          => $request->getHeaders()->get('long', ''), // 经度
                'lat'           => $request->getHeaders()->get('lat', ''), // 纬度
                'ip'            => $request->getHeaders()->get('ip', ''), // IP
                'device_type'   => $request->getHeaders()->get('device-type', ''), // 设备类型 A=安卓，I=iOS，H=H5
                'device_model'  => $request->getHeaders()->get('device-model', ''), // 设备型号
                'device_id'     => $request->getHeaders()->get('device-id', ''), // 设备id
                'idfa'          => $request->getHeaders()->get('idfa', ''), // iOS设备唯一标示 idfa
                'mac'           => $request->getHeaders()->get('mac', ''), // mac
                'is_root'       => $request->getHeaders()->get('is-root', ''), // 设备是否越狱1为已越狱0为未越狱
                'version'       => $request->getHeaders()->get('version', ''), // 当前使用的APP版本
            ];
        }            

        return $data;
    }

    public function post_get($key = null, $default = ''){
        
        $data = [];

        if (Yii::$app->request->isPost) {            
            if ($key) {
                $data = Yii::$app->request->post($key, $default);
            }else{
                $data = Yii::$app->request->post();
            }
        }

        if (Yii::$app->request->isGet) {         
            if ($key) {
                $data = Yii::$app->request->get($key, $default);
            }else{
                $data = Yii::$app->request->get();
            }
        }

        return $data;
    }

    public function getVal($array = array(), $key = '', $default = '')
    {
        return (isset($array[$key]) && !empty($array[$key])) ? $array[$key] : $default;
    }

    // 获取IP地址（摘自discuz）
    public function getIp(){
        $ip='未知IP';
        if(!empty($_SERVER['HTTP_CLIENT_IP'])){
            return $this->is_ip($_SERVER['HTTP_CLIENT_IP'])?$_SERVER['HTTP_CLIENT_IP']:$ip;
        }elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
            return $this->is_ip($_SERVER['HTTP_X_FORWARDED_FOR'])?$_SERVER['HTTP_X_FORWARDED_FOR']:$ip;
        }else{
            return $this->is_ip($_SERVER['REMOTE_ADDR'])?$_SERVER['REMOTE_ADDR']:$ip;
        }
    }

    public function is_ip($str){
        $ip=explode('.',$str);
        for($i=0;$i<count($ip);$i++){
            if($ip[$i]>255){
                return false;
            }
        }
        return preg_match('/^[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}$/',$str);  
    }

    public function getMillisecond() { 
        list($s1, $s2) = explode(' ', microtime()); 
        return (float)sprintf('%.0f', (floatval($s1) + floatval($s2)) * 1000); 
    }
}
