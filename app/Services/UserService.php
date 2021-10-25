<?php


namespace App\Services;


use App\Models\Adresses;
use GuzzleHttp\Client;
use http\Env\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Ixudra\Curl\Facades\Curl;

class UserService
{
    public function GetUser(){
        $response = Http::withHeaders([
            "auth"  => config('auth_okipost')['auth']
        ])->get("https://okipost.com/api/", [
            "lang" => "en",
            "action" => "userinfo",
            "tkn"=> Auth::guard('user')->user()->token,
        ]);
        return $response->json('user');
    }
    public function GetUserTable($number){
        if (Auth::guard('user')->check()){
            $response = Http::withHeaders([
                "auth"  => config('auth_okipost')['auth']
            ])->get("https://okipost.com/api/", [
                "lang" => "en",
                "action" => "gettable",
                "tb" => $number,
                "tkn"=> Auth::guard('user')->user()->token,
            ]);
            return $response->json();
        }
    }
    public function GetUserTables(){
        if (Auth::guard('user')->check()){
            $response = Http::withHeaders([
                "auth"  => config('auth_okipost')['auth']
            ])->get("https://okipost.com/api/", [
                "lang" => "en",
                "action" => "getdata",
                "tkn"=> Auth::guard('user')->user()->token,
            ]);
            return $response->json();
        }

    }
    public function ActivateAccount($sms,$code){
        $response = Http::withHeaders([
            "auth"  => config('auth_okipost')['auth']
        ])->get("https://okipost.com/api/", [
            "lang" => "md",
            "action" => "activate",
            "code"=> $sms,
            "uid" => $code
        ]);
        return $response;
    }
    public function AddBalance($value, $uid){
        $response = Http::withHeaders([
            "auth"  => config('auth_okipost')['auth']
        ])->get("https://okipost.com/api/", [
            "uid"=> $uid,
            "lang" => "md",
            "action" => "recharge",
            'value' => $value,
        ]);
        return $response->json();
    }
    public function SearchPackage($track){
        $response = Http::withHeaders([
            "auth"  => config('auth_okipost')['auth']
        ])->get("https://okipost.com/api/", [
            "lang" => "en",
            "action" => "search",
            "track"=> $track,
        ]);
        return $response->json();
    }
    public function AddPackage(
        $c,
        $track,
        $url,
        $address,
        $price,
        $currency,
        $info,
        $delivery_method_select,
        $user_to,
        $comment,
        $add
        ){
//        dd($useronfo = [
//            'c'=>$c,
//            'user_to'=>$user_to,
//            'price'=>$price,
//            'currency'=>$currency,
//            'address1' => $address['address1'],
//            'city' => $address['city'],
//            'name' => $address['name'],
//            'surname' => $address['surname'],
//            'phone' => $address['phone'],
//            'passport' => $address['passport'],
//            'track'=>$track,
//            'delivery_method'=>$delivery_method_select,
//            'comment' => $comment,
//            'url'=>$url,
//            'info'=>$info,
//            'add'=>$add
//        ]);
        $response = Http::asForm()->withHeaders([
            "auth"  => config('auth_okipost')['auth']
        ])->post("https://okipost.com/api/?lang=md&action=addparcel&tkn=".Auth::guard('user')->user()->token."",
            [
                'c'=>$c,
                'user_to'=>$user_to,
                'price'=>$price,
                'currency'=>$currency,
                'address1' => $address['address1'],
                'city' => $address['city'],
                'name' => $address['name'],
                'surname' => $address['surname'],
                'phone' => $address['phone'],
                'passport' => $address['passport'],
                'track'=>$track,
                'delivery_method'=>$delivery_method_select,
                'comment' => $comment,
                'url'=>$url,
                'info'=>$info,
                'add'=>$add
                ]
            );
            return $response->json();

    }
    public function PasswordReset($uid,$newpassword){
        $response = Http::withHeaders([
            "auth"  => config('auth_okipost')['auth']
        ])->get("https://okipost.com/api/", [
            "lang" => "md",
            "action" => "passwordreset",
            "uid" => $uid,
            "password"=> $newpassword,
        ]);
        return $response->json();
    }
    public function ShippingPay($track){
        $response = Http::withHeaders([
            "auth"  => config('auth_okipost')['auth']
        ])->get("https://okipost.com/api/", [
            "lang" => "md",
            "action" => "payforparcel",
            "track"=> $track,
        ]);
        return $response->json();
    }
    public function PayForDelivery($track){
        $response = Http::withHeaders([
            "auth"  => config('auth_okipost')['auth']
        ])->get("https://okipost.com/api/", [
            "lang" => "md",
            "action" => "payfordelivery",
            "track"=> $track,
        ]);
        return $response->json();
    }
    public function GetAddresses($tkn){
        $response = Http::withHeaders([
            "auth"  => config('auth_okipost')['auth']
        ])->get("https://okipost.com/api/", [
            "lang" => "md",
            "action" => "addresses",
            "tkn"=> $tkn,
        ]);
        return $response->json();
    }
    // Local Register Address
    public function LocalRegisterAddress($data){
        $address = new Adresses();
        $address->code = Auth::guard('user')->user()->code;
        $address->city = $data['city'];
        $address->address = $data['address1'];
        $address->name = $data['name'];
        $address->surname = $data['surname'];
        $address->phone = $data['phone'];
        $address->passport = $data['passport'];
        $address->save();
    }
}
