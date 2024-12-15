<?php

namespace App;

use GuzzleHttp\Client;

class EasyServeSms
{
    //http://enterprise.easyserve.me/http-api.php?username=enterusername&password=enterpassword&senderid=6char-senderid&route=1&number=enternumber&message=hello there



    // EASYSERVESMS_URL_ENDPOINT="http://enterprise.easyserve.me/http-api.php"
    // EASYSERVESMS_USERNAME="radh5234"
    // EASYSERVESMS_PASSWORD="123456"
    // EASYSERVESMS_SENDERID="VAAHAN"

    public $ep = "http://login.redsms.in/API/SendMessage.ashx";
   // public $user = "Satish999";
   // public $password = "121212";
    public $user = "Sateesh";
    public $password = "1998";
    public $phone = "";
    public $text = "";
    public $type = "t";
    //public $senderid =  "VAAHAN";
    public $senderid =  "VVAHAN";
    // public $stype = "normal";

    private static  $current = null;

    public static $defaultOptions = [
        "ep" => "http://login.redsms.in/API/SendMessage.ashx",
        "user" => "Sateesh",
        "password" => "1998",
        "phone" => "",
        "text" => "",
        "type" => "t",
        //"senderid" => "VAAHAN",
        "senderid" => "VVAHAN",
        // "stype" => "normal"
    ];
    public static function bootEasyServeSms()
    {
        if (static::$current == null) static::$current = new EasyServeSms();
    }
    public static function boot()
    {
        static::bootEasyServeSms();
    }


    public function __construct($arr = true)
    {
        if ($arr == true) {
            $this->initFromEnv();
        } else if (is_array($arr)) {
            $this->initFromArray($arr);
        }
    }

    public function initFromEnv()
    {
        $arr = (array)static::$defaultOptions;
        if (env('EASYSERVESMS_URL_ENDPOINT')) $arr['ep'] = env('EASYSERVESMS_URL_ENDPOINT');
        if (env('EASYSERVESMS_USERNAME')) $arr['username'] = env('EASYSERVESMS_USERNAME');
        if (env('EASYSERVESMS_PASSWORD')) $arr['password'] = env('EASYSERVESMS_PASSWORD');
        if (env('EASYSERVESMS_SENDERID')) $arr['senderid'] = env('EASYSERVESMS_SENDERID');
        $this->initFromArray($arr);
    }

    public function initFromArray($arr = [])
    {
        if (is_array($arr)) {
            $this->ep = array_value($arr, "ep", "");
            $this->senderid = array_value($arr, "senderid", "");
            $this->type = array_value($arr, "type", "");
            // $this->stype = array_value($arr, "stype", "");
            $this->user = array_value($arr, "user", "");
            $this->password = array_value($arr, "password", "");
        }
    }

    public function sendSmsOld($number, $msg)
    {
        $client = new Client();

        $this->phone = $number;
        $this->text = $msg;
        $params = [
            "user" => $this->user,
            "password" => $this->password,
            "phone" => $this->phone,
            "text" => $this->text,
            "type" => $this->type,
            "senderid" => $this->senderid,
            // "stype" => $this->stype,
        ];
        $query  = http_build_query($params);
        $url = "{$this->ep}?{$query}";
        $response = $client->get($url);

        // dd((string)$response->getBody(), $url);
        return;
    }
 public function sendSmsolds($number, $msg)
    {
        $client = new Client();

        $this->phone = $number;
        $this->text = $msg;
        $params = [
            "username" => "rtotax",
            "sendername" => "VVAHAN",
			"smstype"=>"TRANS",
			"numbers"=>$this->phone,			
			"apikey"=>"86ab250b-4622-4944-b481-ab2b92274db1",
            "phone" => $this->phone,
            "message" => $this->text,
            
        ];
        $query  = http_build_query($params);
        $url = "http://sms.99junction.com/sendSMS?{$query}";
        $response = $client->get($url);

        // dd((string)$response->getBody(), $url);
        return;
    }
     public function sendSmsolds2($number, $msg)
    {
        $client = new Client();

        $this->phone = $number;
        $this->text = $msg;
        $params = [
            "userid" => "Sateesh",
            "password" => "1998",
			"sender"=>"VVAHAN",
			"mobileno"=>$this->phone,			
            "msg" => $this->text,
			"peid"=>"1201159811275854412",
            "tpid" => "1207162935613578198",
            
        ];
        $query  = http_build_query($params);
        $url = "http://103.231.100.41/websms/sendsms.aspx?{$query}";
        $response = $client->get($url);

        // dd((string)$response->getBody(), $url);
        return;
    }
    
     public function sendSms($number, $msg)
    {
        $client = new Client();

        $this->phone = $number;
        $this->text = $msg;
        $params = [
            "userid" => "Raju123",
            "password" => "1990",
			"sender"=>"XVAHAN",
			"mobileno"=>$this->phone,			
            "msg" => $this->text,
			"peid"=>"1201159811275854412",
            "tpid" => "1207163106992465316",
            
        ];
        $query  = http_build_query($params);
        $url = "http://103.231.100.41/websms/sendsms.aspx?{$query}";
        $response = $client->get($url);

        // dd((string)$response->getBody(), $url);
        return;
    }
    public static function Send($number, $msg)
    {
        if (static::$current) return static::$current->sendSms($number, $msg);
        return false;
    }
}
