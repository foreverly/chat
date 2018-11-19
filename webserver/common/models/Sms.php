<?php
namespace common\models;

class Sms {

    private $url = 'http://c.dzd.com/v4/sms/send.do';
    private $appid  = 1400039869;
    private $appkey = 'ac6b500379f0f39de9da335faebea4bc';
    private $tempId = 41595;

    public function __construct() {
        
    }

    function sendCurlPost($url, $dataObj) {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_HEADER, 0);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($dataObj));
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
        $ret = curl_exec($curl);
        if (false == $ret) {
            // curl_exec failed
            $result = "{ \"result\":" . -2 . ",\"errmsg\":\"" . curl_error($curl) . "\"}";
        } else {
            $rsp = curl_getinfo($curl, CURLINFO_HTTP_CODE);
            if (200 != $rsp) {
                $result = "{ \"result\":" . -1 . ",\"errmsg\":\"". $rsp . " " . curl_error($curl) ."\"}";
            } else {
                $result = $ret;
            }
        }
        curl_close($curl);
        return $result;
    }
    /**
     * /
     * @param  [type] $request_time [请求时间] date(YmdHis)
     * @param  [type] $mobiles      [手机号码] 多个以逗号拼接，不超过1000个
     * @param  [type] $content      [string]
     * @return [type]               [array]
     */
    public function sendMsg($request_time, $mobiles, $content) {
        $sign = md5($this->uid . $this->key . $request_time);
        $url  = $this->url;
        $uid  = $this->uid;

        $data = array(
                        'uid'          => $uid, 
                        'timestamp'    => $request_time, 
                        'mobile'       => $mobiles, 
                        'text'         => $content, 
                        'sign'         => $sign,
                        // 'callback_url' => ''
                    );

        $o = '';
        foreach ($data as $k => $v)
        {
            $o .= "$k=".urlencode($v).'&';
        }
        $post_data = substr($o, 0, -1);

        $res = $this->_request($url, $post_data);
        
        return json_decode($res, true);
    }
}