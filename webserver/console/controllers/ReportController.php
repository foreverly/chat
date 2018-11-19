<?php
namespace console\controllers;

use Yii;
use yii\console\Controller;
use api\models\Credit;

class ReportController extends Controller
{
	private $_base_path = '';
	private $_file_name = '';
  	/**
   	 * This command echoes what you have entered as the message.
   	 * @param string $message the message to be echoed.
     */
  	public function init()
  	{
  		$this->_base_path = Yii::getAlias("@api").'/log';
  		$this->_file_name = 'credit_report_log.txt';
  	}

  	public function actionHandle()
  	{
     	header("Content-type: text/html; charset=utf-8");
     	// ignore_user_abort(true); // 用户关闭浏览器继续执行
     	set_time_limit(0); // 设置超时执行时间
		date_default_timezone_set('PRC'); // 切换到中国的时间

		$redis = Yii::$app->redis;
		$cron_file = $this->_base_path.'/cron-run';
		// if(!file_exists($cron_file)) exit();

     	$i = 0;
     	$insert_data = [];
    	while ($content = $redis->lpop('credit_report_log')) {
    		if (!file_exists($this->_base_path)) {
	            mkdir($this->_base_path, 777);
	        }

			$i++;
	        $file = $this->_base_path . '/' . $this->_file_name;
	        if(!$f = file_put_contents($file, $content, FILE_APPEND)){ 
	            continue;
	        }

	        $content = explode('|', $content);

	        $tmp_data[$content[1]] = isset($tmp_data[$content[1]]) ?$tmp_data[$content[1]] + 1 : 1;

	        if ($i%10 == 0) {
	        	$sql = 'UPDATE credit SET apply_num = CASE ';
	        	$j = 0;
	        	foreach ($tmp_data as $k => $v) {
	        		$sql .= " WHEN credit_id = {$k} THEN apply_num+{$v}";
	        	}

	        	$sql .= " ELSE apply_num END";
	        	
	        	$result = Yii::$app->db->createCommand($sql)->execute();
	        }

	        // @unlink($cron_file);
    	}

		echo 'ok';
  	}

    public function getMillisecond() { 
        list($s1, $s2) = explode(' ', microtime()); 
        return (float)sprintf('%.0f', (floatval($s1) + floatval($s2)) * 1000); 
    }
}