<?php
namespace common\models;

class SendMessage {

    private $url = 'http://c.dzd.com/v4/sms/send.do';
    private $yzm_uid = 374;
    private $yzm_key = '5589d06ad4eb85fe599fce90447f354a';
    private $uid = 444;
    private $key = 'f54351bb8353da078ac91eb6a7c507b3';

    public function __construct() {
        
    }

    public function _request($url, $post_data = '') {
        $header = array('Content-Type: application/x-www-form-urlencoded', 'Accept: application/json;charset=UTF-8');
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
        curl_setopt($ch, CURLOPT_TIMEOUT, 20);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
        if (!empty($post_data)) {
            curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
            curl_setopt($ch, CURLOPT_POST, 1);
        }
        $res = curl_exec($ch);

        curl_close($ch);
        return $res;
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
                        'text'         => '【贷理通】' . $content . '退订回T', 
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