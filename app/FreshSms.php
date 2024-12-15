<?php

namespace App;

use GuzzleHttp\Client;

class FreshSms
{


    public $ep = "http://login.redsms.in/API/SendMessage.ashx";
    public $user = "Satish999";
    public $pass = "121212";
    public $sender =  "VAAHAN";
    public $phone = "";
    public $text = "";
    public $priority = "ndnd";
    public $stype = "normal";
    // "pass" => "123456",
    // "sender" => "VAAHAN",
    // "phone" => "9679624770",
    // "text" => "Test SMS From oo",
    // "priority" => "ndnd",
    // "stype" => "normal"

    private static  $current = null;

    public static $defaultOptions = [
        "ep" => "http://login.redsms.in/API/SendMessage.ashx",
        "user" => "Satish999",
        "pass" => "121212",
        "sender" => "VAAHAN",
        "phone" => "",
        "text" => "",
        "priority" => "ndnd",
        "stype" => "normal"
    ];

    public static function bootFreshSms()
    {
        if (static::$current == null) static::$current = new FreshSms();
    }

    public static function boot()
    {
        static::bootFreshSms();
    }
    // FRESHSMS_URL_ENDPOINT="http://trans.smsfresh.co/api/sendmsg.php"
    // FRESHSMS_USERNAME="radheybhai"
    // FRESHSMS_PASSWORD="123456"
    // FRESHSMS_SENDERID="VAAHAN"

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
        if (env('FRESHSMS_URL_ENDPOINT')) $arr['ep'] = env('FRESHSMS_URL_ENDPOINT');
        if (env('FRESHSMS_USERNAME')) $arr['user'] = env('FRESHSMS_USERNAME');
        if (env('FRESHSMS_PASSWORD')) $arr['pass'] = env('FRESHSMS_PASSWORD');
        if (env('FRESHSMS_SENDERID')) $arr['sender'] = env('FRESHSMS_SENDERID');
        $this->initFromArray($arr);
    }

    public function initFromArray($arr = [])
    {
        if (is_array($arr)) {
            $this->ep = array_value($arr, "ep", "");
            $this->sender = array_value($arr, "sender", "");
            $this->priority = array_value($arr, "priority", "");
            $this->stype = array_value($arr, "stype", "");
            $this->user = array_value($arr, "user", "");
            $this->pass = array_value($arr, "pass", "");
        }
    }

    public function sendSms($number, $msg)
    {
        $client = new Client();

        $this->phone = $number;
        $this->text = $msg;
        $params = [
            "user" => $this->user,
            "pass" => $this->pass,
            "sender" => $this->sender,
            "phone" => $this->phone,
            "text" => $this->text,
            "priority" => $this->priority,
            "stype" => $this->stype,
        ];
        $query  = http_build_query($params);
        $url = "{$this->ep}?{$query}";
        $response = $client->get($url);

        // dd((string)$response->getBody());
        return;
    }

    public static function Send($number, $msg)
    {
        if (static::$current) return static::$current->sendSms($number, $msg);
        return false;
    }

}
