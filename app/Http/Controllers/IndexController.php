<?php

namespace App\Http\Controllers;

use App\Components\AuthClientService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;
use App\Services\SeoService;
class IndexController extends Controller
{
    protected $SeoService;
    public function __construct(SeoService $SeoService){
        $this->SeoService = $SeoService;
    }
    public function index(Request $request){
        $this->SeoService->setSEO(
            'Okipost Moldova - Осуществляем доставку товаров в Молдову',
            'Почтовый сервис, осуществляющий доставку товаров из Китая, России, Америки, Турции, Германии, Англии, Грузии в Молдову.',
            ['Почта, Доставка','Молдова','AliExpress','Посылка'],
            'Okipost Moldova - Будь первым!',
            'OkiPost Moldova-почтовый сервис, осуществляющий доставку товаров из Китая, России, Америки, Турции, Германии, Англии, Грузии в Молдову.',
            ''
        );
        if ($request->ajax()){
            $calculate = Http::withHeaders([
                "auth"  => config('auth_okipost')['auth']
            ])->get("https://okipost.com/api/", [
                "lang" => "md",
                "action" => "calculator",
                "from"=> $request->input('from_country'),
                "to"=> $request->input('to_country'),
                "ves" => $request->input('ves'),
                "l" => $request->input('lenght'),
                "w" => $request->input('weight'),
                "h" => $request->input('height'),
            ]);
            $result = $calculate->json('done');
            $from = $request->input('text_from');
            $to = $request->input('text_to');
            $value = $calculate->json('value');
            $ves = $calculate->json('ves');
            $obves = $calculate->json('obves');
            if ($result){
                $response['status'] = true;
                $response['value'] = $calculate->json('value');
                $response['ves'] = $calculate->json('ves');
                $response['obves'] = $calculate->json('obves');
                $response['calculator'] = view('frontend.layouts.ajax.calculator',compact(['from','to','ves','value','obves']))->render();
                $response['msg']= 'Мы успешно рассчитали стомость посылки!';
                return json_encode($response);
            } else{
                $response['status'] = false;
                $response['msg'] = 'Вы ввели неправильные данные...';
                return json_encode($response);
            }
        }
        return view('frontend.index');
    }
    public function AuthState(){

    }
}
