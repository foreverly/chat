<?php
namespace backend\controllers;

use Yii;
// use yii\web\Controller;
use backend\controllers\CommonController;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use common\models\Upload;
use backend\models\ChatContent;
use backend\models\UserBackendModel as User;
use yii\helpers\ArrayHelper;

/**
 * Chat controller
 */
class ChatController extends CommonController
{
    public $layout = false;

    /**
    * 关闭csrf验证
    */
    public function init()
    {
        $this->enableCsrfValidation = false;
    }

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
                        // 'actions' => ['index', 'save'],
                        // 设置actions的操作是允许访问还是拒绝访问
                        'allow' => true,
                        // @ 当前规则针对认证过的用户; ? 所有访客均可访问
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }
    
    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('lists.html',[
            // 'fromid' => Yii::$app->user->id,
            'fromid' => Yii::$app->request->get('fromid', '')
        ]);
    }
    
    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionWith()
    {
        return $this->render('index.html',[
            // 'fromid' => Yii::$app->user->id,
            'fromid' => Yii::$app->request->get('fromid', ''),
            'toid' => Yii::$app->request->get('toid', ''),
        ]);
    }

    /**
    *  消息文本保存
    */
    public function actionSave()
    {
        $post_data = Yii::$app->request->post();

        $model = new ChatContent();
        $model->fromid = $post_data['fromid'];
        $model->fromname = User::getName($post_data['fromid']);
        $model->toid = $post_data['toid'];
        $model->toname = User::getName($post_data['toid']);
        $model->content = $post_data['data'];
        $model->isread = 0;
        $model->created_time = $post_data['date'];
        $model->type = 1; // 1=文本,2=图片

        $model->save(false);
    }

    /**
    *  消息图片保存
    */
    public function actionUploadImg()
    {
        $post_data = Yii::$app->request->post();
        
        $file = $_FILES['file'];
        if (!is_dir(Yii::getAlias("@webroot")."/upload/")) {
            mkdir(Yii::getAlias("@webroot")."/upload/");
        }
        $file_name = uniqid('chat_img_');
        $file_path = "/upload/" . $file_name . strrchr($file['name'], '.');
        
        if ($res = move_uploaded_file($file['tmp_name'], Yii::getAlias("@webroot") . $file_path)) {
            
            $model = new ChatContent();
            $model->fromid = $post_data['fromid'];
            $model->fromname = User::getName($post_data['fromid']);
            $model->toid = $post_data['toid'];
            $model->toname = User::getName($post_data['toid']);
            $model->content = $file_path;
            $model->isread = 0;
            $model->created_time = date('Y-m-d H:i:s');
            $model->type = 2; // 1=文本,2=图片

            $model->save();

            return $this->success(['img_url' => $file_path]);
        }
    }

    /**
    *  消息列表
    */
    public function actionList()
    {
        $fromid = Yii::$app->request->post('fromid', '');

        $res = ChatContent::find()
            ->select(['fromid', 'toid', 'content', 'isread', 'type', 'created_time'])
            ->where(['toid' => $fromid])
            ->orderBy('created_time asc')
            ->joinWith('user')
            ->asArray()
            ->all();

        $opts = [];
        foreach ($res as $key => $value) {
            $fromid = $value['fromid'];
            $toid = $value['toid'];
            if (!isset($noread[$fromid])) {
                $noread[$fromid] = 0;
            }
            if(!$value['isread']){
                $noread[$fromid]++;
            }

            $opts[$fromid] = [
                'fromid' => $fromid,
                'fromname' => $value['user']['fromname'],
                'head' => $value['user']['head_url'],
                'toid' => $toid,
                'content' => $value['content'],
                'noread' => $noread[$fromid],
                'type' => $value['type'],
                'chat_url' => '/chat/with?fromid=' . $toid . '&toid=' . $fromid,
                'created_time' => $value['created_time'],
            ];
        }

        return $this->success(array_values($opts));
    }

    /**
    * 修改已读状态
    */
    public function actionChangeRead()
    {
        $fromid = Yii::$app->request->post('fromid', '');
        $toid = Yii::$app->request->post('toid', '');

        $res = ChatContent::updateAllCounters(['isread' => 1], ['fromid' => $toid, 'toid' => $fromid, 'isread' => 0]);

        return $this->success($res);
    }

    /**
    *  获取历史消息
    */
    public function actionLoadMessage()
    {
        $fromid = Yii::$app->request->post('fromid', '');
        $toid = Yii::$app->request->post('toid', '');
        $page = Yii::$app->request->post('page', 1);

        $list = ChatContent::find()
            ->where("(fromid=:fromid and toid=:toid) or (fromid=:toid and toid=:fromid)", [":fromid" => $fromid, ":toid" => $toid])
            ->select("*")
            ->limit(10)
            ->offset(($page - 1) * 10)
            ->orderBy('id asc')
            ->asArray()
            ->all();

        return $this->success($list);
    }

    /**
    *  根据用户ID获取头像
    */
    public function actionGetHead()
    {
        $fromid = Yii::$app->request->post('fromid', '');
        $toid = Yii::$app->request->post('toid', '');

        $frominfo = User::find()->where(['id' => $fromid])->select('display_name, head_url')->asArray()->one();
        $toinfo = User::find()->where(['id' => $toid])->select('display_name, head_url')->asArray()->one();

        return $this->success(['frominfo' => $frominfo, 'toinfo' => $toinfo]);
    }
}
