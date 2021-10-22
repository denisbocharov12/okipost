<?php

namespace App\Http\Controllers;

use App\Models\CargoServices;
use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\CargoServices as MailCargoServices;
class PagesController extends Controller
{

    protected $userService;
    public function __construct(UserService $userService){
        $this->userService = $userService;
    }
    public function faq(){
        return view('frontend.pages.faq.index');
    }
    public function prohibited(){
        return view('frontend.pages.prohibited.index');
    }
    public function aboutus(){
        return view('frontend.pages.about-us.index');
    }
    public function cargo(){
        return view('frontend.pages.cargo.index');
    }
    public function adresses(){
        return view('frontend.pages.adresses.index');
    }
    public function shops(){
        return view('frontend.pages.shops.index');
    }
    public function cargoPost(Request $request){
        if ($request->ajax()){
            $fio = $request->input('fio');
            $service = $request->input('service');
            $phone = $request->input('phone');
            $email = $request->input('email');
            $comment = $request->input('comment');
            $data = [
                'fio' => $fio,
                'service' => $service,
                'phone' => $phone,
                'email' => $email,
                'comment' => $comment
            ];
            $status = $this->RegiterService($data);
            if ($status !== null){
                //Mail::to($email)->send(new MailCargoServices($data));
                $response['status'] = true;
                $response['msg'] = 'Мы успешно получили вашу заявку!';
                return $response;
            } else {
                $response['status'] = false;
                $response['msg'] = 'Что-то пошло не так';
                return $response;
            }
        }
    }
    public function RegiterService($data){
        $status = CargoServices::create($data);
        return $status;
    }
    public function contacts(){
        return view('frontend.pages.contacts.index');
    }
}
