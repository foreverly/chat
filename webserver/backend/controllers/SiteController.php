<?php
namespace backend\controllers;

// use api\modules\v1\controllers\CommonController;
use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use common\models\Upload;
use backend\models\Data;
use yii\web\UploadedFile;
//这里主要是拿到authtoken给authhandler后返回一个authclient的对象
use backend\components\AuthHandler;
use backend\models\UserBackendModel as User;

/**
 * Site controller
 */
class SiteController extends Controller
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
                        'actions' => ['login', 'error', 'auth'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                    [
                        // 当前rule将会针对这里设置的actions起作用，如果actions不设置，默认就是当前控制器的所有操作
                        'actions' => ['index', 'view', 'create', 'signup'],
                        // 设置actions的操作是允许访问还是拒绝访问
                        'allow' => true,
                        // @ 当前规则针对认证过的用户; ? 所有访客均可访问
                        'roles' => ['@'],
                    ],
                    [
                        'actions' => ['update', 'delete', 'upload'],
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

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'auth' => [
                'class' => 'yii\authclient\AuthAction',
                'successCallback' => [$this, 'onAuthSuccess'],
            ],
        ];
    }

    public static function onAuthSuccess ($client)
    {
        $auth = (new AuthHandler($client))->handle();

        // 没有绑定本站的用户必须去绑定
        if ($auth->user_id == 0) {
            // 请绑定后台账号
            echo "请绑定后台账号";exit;
        }else{

            $user = User::findOne($auth->user_id);
            // // 登录
            Yii::$app->user->login($user, 3600 * 24 * 30);
            header('Location:/site/index');
        }
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        $model = new Upload();
        return $this->render('index',['model' => $model]);
    }

    /**
     * Login action.
     *
     * @return string
     */
    public function actionLogin()
    {
        // 判断用户是访客还是认证用户 
        // isGuest为真表示访客，isGuest非真表示认证用户，认证过的用户表示已经登录了，这里跳转到主页面
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        // 实例化登录模型 common\models\LoginForm
        $model = new LoginForm();
        // 已登录跳转到首页
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } 
        // 未登录跳转登录页
        else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Upload action.
     *
     * @return string
     */
    public function actionUpload()
    {
        set_time_limit(300);
        $model = new Upload();
        $file = UploadedFile::getInstances($model, 'inputFile')[0];
        
        if($file){

            $filename = 'uploads/file_' . time() . rand(1111,9999) . '.' . $file->extension;
            $file->saveAs($filename);
            
            $excel_list = $model->readExcel($filename);

            $data = [];
            foreach ($excel_list as $i => $value) {
                if ($i > 0) {
                    $data[] = [$k => $value[0]];
                }else{
                    $k = $value[0];
                }
            }
                        
            if (!empty($data)) {
                $res = Yii::$app->db->createCommand()->batchInsert(Data::tableName(),[$k],$data)->execute();

                if (!$res) {
                    echo json_encode(['code'=>200, $msg => '上传失败'], true);
                }
            }            
        }
        echo json_encode(['code'=>200, $msg => '上传成功'], true);
    }

    /**
     * Logout action.
     *
     * @return string
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }
}
