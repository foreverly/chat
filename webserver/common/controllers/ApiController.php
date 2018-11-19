<?php

namespace common\controllers;

use yii\rest\ActiveController;

/**
 * Common controller for the `api` module
 */
class ApiController extends ActiveController
{
	public function error($msg){
		return ['-1', $msg];
	}
    
}