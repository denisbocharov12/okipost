<?php


namespace App\Services;


use Illuminate\Support\Facades\Http;

class LoginRegisterService
{
    public function UserLogin($email, $password){
        $response = Http::withHeaders([
            "auth"  => config('auth_okipost')['auth']
        ])->get("https://okipost.com/api/index.php", [
            "lang" => "en",
            "action" => "login",
            "email"=> $email,
            "password"=> $password
        ]);
        return $response;
    }
    public function UserRegisterFiz(array $data){
        $response = Http::withHeaders([
            "auth"  => config('auth_okipost')['auth']
        ])->get("https://okipost.com/api/", [
            "lang" => "md",
            "action" => "registerind",
            "email"=> $data['email_fiz'],
            "password"=> $data['password_fiz'],
            "gender"=>$data['gender'],
            "name"=>$data['name_fiz'],
            "surname"=>$data['surname_fiz'],
            "prefix"=>994,
            "mobile"=>$data['phone_fiz'],
            "city"=>$data['city_fiz'],
            "userid"=>$data['user_id'],
            "rules"=>$data['rule_fiz']
        ]);
        return $response;
    }
    public function UserRegisterIur(array $data){
        $response = Http::withHeaders([
            "auth"  => config('auth_okipost')['auth']
        ])->get("https://okipost.com/api/", [
            "lang" => "md",
            "action" => "registercorp",
            "email"=> $data['email_iur'],
            "password"=> $data['password_iur'],
            "orgname"=>$data['orgname'],
            "prefix"=>994,
            "orgmobile"=>$data['orgmobile'],
            "city"=>$data['city_iur'],
            "orgid"=>$data['orgid'],
            "rules"=>$data['rule_iur']
        ]);
        return $response;
    }

}
