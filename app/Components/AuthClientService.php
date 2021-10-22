<?php


namespace App\Components;


use GuzzleHttp\Client;
use Illuminate\Support\Facades\Http;


class AuthClientService
{
    public $response;

    /**
     * ImportDataClient constructor.
     * @param $client
     */


    public function Auth($email, $password){
        $response = Http::withHeaders([
            "auth"  => "58583866893jugjbt5096mkfboki95968845"
        ])->get("https://okipost.com/api/index.php", [
            "lang" => "en",
            "action" => "login",
            "email"=> $email,
            "password"=> $password
        ]);
        return $response->json();
    }

}
