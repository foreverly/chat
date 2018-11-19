<?php

namespace common\lib\SMS;

require_once "SmsSender.php";
require_once  "SmsVoiceSender.php";

use common\lib\SMS\SmsSingleSender;
use common\lib\SMS\SmsMultiSender;
use common\lib\SMS\SmsVoicePromtSender;
use common\lib\SMS\SmsVoiceVeriryCodeSender;

/**
* 
*/
class Sms {

    private $appid  = 1400039869;
    private $appkey = 'ac6b500379f0f39de9da335faebea4bc';
    private $tempId = 41595;
    
    function __construct()
    {
        // ...
    }

    function singleSender($mobile, $content){

        try {

            $singleSender = new SmsSingleSender($this->appid, $this->appkey);

            $result = $singleSender->send(0, "86", $mobile, $content, "", "");

        } catch (\Exception $e) {
            echo var_dump($e);
        }

        return json_decode($result);
    }
}
