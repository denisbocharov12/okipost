<?php


namespace App\Services;

use Ixudra\Curl\Facades\Curl;
use Illuminate\Support\Facades\Http;

class SMSService
{
    public function SendSMS($number, $code){
        $PHASH = MD5(config('sms-context')['PID'] . '' . config('sms-context')['PHASH_PASSWORD'] . '' . $number);
        $body = array(
            "PID" => config('sms-context')['PID'],
            "PHASH" => $PHASH,
            "DNIS" => $number,
            "ANI" => "",
            "Alias"=> "okipost.md",
            "Enc" => "UTF8",
            "BMess" => 'Activation code '.$code.'.'
        );
        $send_SMS = Curl::to(config('sms-context')['url'])
            ->withData( "Request=".json_encode($body) )
            ->post();
        return json_decode($send_SMS);
    }
}
