<?php

/**
* 
*/
class exportExcel
{
	
	function __construct(argument)
	{
		# code...
	}

	public function export($data, $field_names, $field, $file_name){
		header('Content-Type:text/csv');
		header('Content-Disposition:attachment;filename="'.$file_name.date('Ymd').'.csv"');
		header('Cache-Control:must-revalidate,post-check=0,pre-check=0');
		header('Expires:0');
		header('Pragma:public');

		echo iconv('utf-8', 'gb2312', implode(',', $field_names)).PHP_EOL;

		foreach ($data as $value) {
			foreach ($field as $i => $v) {
				$e_data[] = $value[$v];
			}

			echo iconv('utf-8', 'gb2312', implode(',', $e_data)).PHP_EOL;
			unset($e_data);
		}
	}
}

?>