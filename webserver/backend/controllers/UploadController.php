<?php

namespace backend\controllers;

use common\controllers\Upload;
use yii\helpers\Json;
// use yii\web\Controller;
use backend\controllers\CommonController;
use flyok666\qiniu\Qiniu;
use yii\filters\AccessControl;

class UploadController extends CommonController
{

    const QINIU_ACCESS_KEY = 'gg46qtzFQKddLuIPRBui11xYpernONy2_gAxPZpG';
    const QINIU_SECRET_KEY = 'YkkL_USGBcOy1ROdNiFVJTBvJnOqMLrPm5aX3_Hj';
    const QINIU_DOMAIN     = 'otuxfh7yv.bkt.clouddn.com'; // 域名
    const QINIU_BUCKET     = 'dlitong';// 空间名

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
                        'actions' => ['do', 'qiniu'],
                        // 设置actions的操作是允许访问还是拒绝访问
                        'allow' => true,
                        // @ 当前规则针对认证过的用户; ? 所有访客均可访问
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }

    // 本服务器
    public function actionDo()
    {
        try {
            $model = new Upload();
            $info = $model->upImage();

            $info && is_array($info) ?
            exit(Json::htmlEncode($info)) :
            exit(Json::htmlEncode([
                'code' => 1, 
                'msg' => 'error'
            ]));

        } catch (\Exception $e) {
            exit(Json::htmlEncode([
                'code' => 1, 
                'msg' => $e->getMessage()
            ]));
        }
    }

    // 上传到七牛第三方
    public function actionQiniu()
    {
        try {

            $config = [
                'accessKey' => self::QINIU_ACCESS_KEY,
                'secretKey' => self::QINIU_SECRET_KEY,
                'domain'    => self::QINIU_DOMAIN,
                'bucket'    => self::QINIU_BUCKET,
                'area'      => Qiniu::AREA_HUANAN
            ];

            $qiniu = new Qiniu($config);

            $key = time();

            $qiniu->uploadFile($_FILES['file']['tmp_name'],$key);

            $url = $qiniu->getLink($key);

            if ($url) {
                $info = [
                    'code' => 0,
                    'url' => 'http://'.$url,
                    'attachment' => 'http://'.$url,
                ];
            }

            $info && is_array($info) ?
            exit(Json::htmlEncode($info)) :
            exit(Json::htmlEncode([
                'code' => 1, 
                'msg' => 'error'
            ]));


        } catch (\Exception $e) {
            exit(Json::htmlEncode([
                'code' => 1, 
                'msg' => $e->getMessage()
            ]));
        }
    }
}
    
