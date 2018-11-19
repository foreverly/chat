<?php

namespace backend\controllers;

use Yii;
use backend\models\UserModel;
use backend\models\UserSearch;
// use yii\web\Controller;
use backend\controllers\CommonController;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * UserController implements the CRUD actions for UserModel model.
 */
class UserController extends CommonController
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
                    // [
                    //     'actions' => ['login', 'error', 'auth'],
                    //     'allow' => true,
                    // ],
                    // [
                    //     'actions' => ['logout'],
                    //     'allow' => true,
                    //     'roles' => ['@'],
                    // ],
                    [
                        // 当前rule将会针对这里设置的actions起作用，如果actions不设置，默认就是当前控制器的所有操作
                        'actions' => ['index', 'view', 'create', 'charts', 'data', 'channel'],
                        // 设置actions的操作是允许访问还是拒绝访问
                        'allow' => true,
                        // @ 当前规则针对认证过的用户; ? 所有访客均可访问
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

    /**
     * Lists all UserModel models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new UserSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single UserModel model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new UserModel model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new UserModel();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing UserModel model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing UserModel model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the UserModel model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return UserModel the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = UserModel::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionData(){
        $model = new UserModel();

        $post_data = Yii::$app->request->post();

        $date_list = isset($post_data['date'])?$post_data['date']:'';

        if (empty($date_list)) {
            $start = date('Y-m-d', strtotime('-14 days'));
            $end   = date('Y-m-d');
        }else{
            $date_arr = explode(' - ', $date_list);
            $start = $date_arr[0];
            $end   = empty($date_arr[1])?$date_arr[0]:$date_arr[1];
        }

        $data = $model->getData($start, $end);
        
        return $this->render('data', [
            'data' => $data,
        ]);
    }
}
