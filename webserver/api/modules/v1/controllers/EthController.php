<?php

namespace api\modules\v1\controllers;
use Yii;
use api\models\MakeEth;
use api\models\Node;

class EthController extends \api\modules\v1\controllers\CommonController
{

	public $modelClass = 'api\models\MakeEth';

    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
	 * @MakeEth
	 */
    public function actionMake(){
    	$post_data = $this->post_get();

    	$model = new MakeEth();

    	$model->setAttributes($post_data);
    	$model->request_time = date('Y-m-d H:i:s');
    	$model->created_time = date('Y-m-d H:i:s');
    	$model->make_eth = md5($model->email . $model->eth);

    	$model->validate();
    	$model->save();
        $data=md5($model->email . $model->eth);
    	if ($error = $this->getModelError($model)) {
    		return $this->error($error);
    	}

    	return $this->success($data);
    }


    /**
	 * @MakeEth
	 */
    public function actionGrabNode(){
    	$post_data = $this->post_get();

    	$model = new Node();

    	$model->setAttributes($post_data);
    	$model->request_time = date('Y-m-d H:i:s');
    	$model->created_time = date('Y-m-d H:i:s');

    	$model->validate();
    	$model->save();

    	if ($error = $this->getModelError($model)) {
    		return $this->error($error);
    	}

    	return $this->success();
    }
}
