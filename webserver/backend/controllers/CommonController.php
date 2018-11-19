<?php

namespace backend\controllers;

use Yii;
use yii\helpers\Json;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * Default controller for the `backend` module
 */
class CommonController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        // 当前rule将会针对这里设置的actions起作用，如果actions不设置，默认就是当前控制器的所有操作
                        'actions' => ['index', 'view', 'create'],
                        // 设置actions的操作是允许访问还是拒绝访问
                        'allow' => true,
                        // @=当前规则针对认证过的用户; ?=所有访客均可访问
                        'roles' => ['@'],
                    ],
                    [
                        'actions' => ['update', 'delete'],
                        // 自定义一个规则，返回true表示满足该规则，可以访问，false表示不满足规则，也就不可以访问actions里面的操作啦
                        'matchCallback' => function ($rule, $action) {
                            return Yii::$app->user->id == 1 ? true : false;
                        },
                        'allow' => true,
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
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
    
    public function failed($msg = ''){
        Yii::$app->response->format = yii\web\Response::FORMAT_JSON;
        return [
            'code' => 0,
            'msg'  => $msg
        ];
    }    
    public function error($msg = ''){
        Yii::$app->response->format = yii\web\Response::FORMAT_JSON;
        return [
            'code' => -1,
            'msg'  => $msg
        ];
    }

    public function success($data = array()){
        Yii::$app->response->format = yii\web\Response::FORMAT_JSON;
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

}
