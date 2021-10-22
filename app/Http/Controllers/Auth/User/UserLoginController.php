<?php

namespace App\Http\Controllers\Auth\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginValidation;
use App\Http\Requests\RegisterValidation;
use App\Http\Requests\RegisterValidationIur;
use App\Models\User;
use App\Services\LoginRegisterService;
use App\Services\SMSService;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use App\Mail\ActivationCodeMail;


class UserLoginController extends Controller
{
    protected $loginRegisterService;
    protected $smsService;
    public function __construct(LoginRegisterService $loginRegisterService, SMSService $smsService)
    {
        $this->loginRegisterService = $loginRegisterService;
        $this->smsService = $smsService;
    }
    public function userLogin(Request $request){
        if (Auth::guard('user')->check()){
            toastr()->success('','Вы уже вошли в систему!');
            return redirect()->route('main');
        }else{
            return view('frontend.auth.auth');
        }
    }
    public function userAuth(LoginValidation $request){
        $request->validated();
        //Запрос на сервер OKIPOST {login&password}
        $response = $this->loginRegisterService->UserLogin($request->email, $request->password);
        $token = $response->json('token');
        $message = $response->json('msg');
        $status = $response->json('login');
        // Вход и проверка в базе Okipost + в БД
        if (Auth::guard('user')->attempt(['email'=>$request->email, 'password'=>$request->password,'status'=>'active']) && $status = 1){
            Auth::guard('user')->user()->update(['token'=>$token]);
            if (Session::get('url.intended')){
                return Redirect::to(Session::get('url.intended'));
            } else {
                toastr()->success('Вы успешно вошли в аккаунт.', '');
                return redirect()->intended(route('main'));
            }
        } else{
            toastr()->error('Неверный логин или пароль...', 'Ошибка');
            return redirect()->back();
        }
    }
    public function userRegister(){
        return view('frontend.auth.register');
    }
    public function registerSubmitFiz(RegisterValidation $request){
        $request->validated();
        $data_register = $request->all();
        $response = $this->loginRegisterService->UserRegisterFiz($data_register);
        if ($response->json('status') == 'done'){
            $smsCode = $response->json('smsCode');
            $user_id = preg_replace("/[^,.0-9]/", '', $response->json('user'));
            $token = Str::random(60);
            $data = $request->all();
            $data['code'] = $user_id;
            $check = $this->createUserFiz($data);
            if ($check){
                DB::table('users_activates')->insert([
                        'email' => $data['email_fiz'],
                        'user_or_org_id' => $data['code'],
                        'token' => $token,
                        'status' => 'inactive',
                        'smscode' => $smsCode,
                        'created_at' => Carbon::now()]
                );
                $this->smsService->SendSMS($request->input('phone_fiz'),$smsCode);
                Mail::to($request->input('email_fiz'))->send(new ActivationCodeMail($token));
                toastr()->success('Вы успешно зарегистрировались в системе', 'Успех');
                return redirect()->route('main');
            } else{
                toastr()->error('Что-то пошло не так...', 'Упс...');
                return redirect()->back();
            }
        }
        elseif ($response->json('status') == "error"){
            if ($response->json('errorFields') == 'email'){
                toastr()->error('Такой email уже зарегестрирован...', 'Упс...');
                return redirect()->route('user.register');
            }
        }
        else{
            toastr()->error('Что-то пошло не так...', 'Упс...');
            return redirect()->route('user.register');
        }
    }
    public function registerSubmitIur(RegisterValidationIur $request){
        $request->validated();
        $data_register = $request->all();
        $response = $this->loginRegisterService->UserRegisterIur($data_register);
        if ($response->json('status') == "done"){
            $smsCode = $response->json('smsCode');
            $user_id = preg_replace("/[^,.0-9]/", '', $response->json('user'));
            $token = Str::random(60);
            $data = $request->all();
            $data['code'] = $user_id;
            $check = $this->createUserIur($data);
            if ($check){
                DB::table('users_activates')->insert([
                        'email' => $data['email_iur'],
                        'user_or_org_id' => $data['code'],
                        'token' => $token,
                        'status' => 'inactive',
                        'smscode' => $smsCode,
                        'created_at' => Carbon::now()]
                );
                $this->smsService->SendSMS($request->input('orgmobile'),$smsCode);
                Mail::to($request->input('email_iur'))->send(new ActivationCodeMail($token));
                toastr()->success('Вы успешно зарегистрировались в системе', 'Успех');
                return redirect()->route('main');
            } else{
                toastr()->error('Что-то пошло не так...', 'Упс...');
                return redirect()->back();
            }
        }elseif ($response->json('status') == "error"){
            if ($response->json('errorFields') == 'email'){
                toastr()->error('Такой email уже зарегестрирован...', 'Упс...');
                return redirect()->route('user.register');
            }

        } else{
            toastr()->error('Что-то пошло не так...', 'Упс...');
            return redirect()->route('user.register');
        }
    }

    private function createUserFiz(array $data){
        if ($data['gender'] == 1){
            $gender = 'male';
        } else{
            $gender = 'female';
        }
        $first_name_en = Str::slug($data['name_fiz']);
        $last_name_en = Str::slug($data['surname_fiz']);
        return User::create([
            'code' => $data['code'],
            'first_name' => $data['name_fiz'],
            'last_name' => $data['surname_fiz'],
            'user_id' =>$data['user_id'],
            'gender' => $gender,
            'birthday' =>$data['date_fiz'],
            'country' => $data['country_fiz'],
            'city' => $data['city_fiz'],
            'phone' => $data['phone_fiz'],
            'email' => $data['email_fiz'],
            'regdate'=>Carbon::now()->format('Y-M-D'),
            'status'=> 'inactive',
            'first_name_en' => $first_name_en,
            'last_name_en' => $last_name_en,
            'type' => 'fizical',
            'bonus_code' => 'MD',
            'password' => Hash::make($data['password_fiz']),
        ]);

    }
    private function createUserIur(array $data){
        return User::create([
            'orgname' => $data['orgname'],
            'orgmobile' => $data['orgmobile'],
            'orgid' => $data['orgid'],
            'country' => $data['country_iur'],
            'city' => $data['city_iur'],
            'code' => $data['code'],
            'email' => $data['email_iur'],
            'password' => Hash::make($data['password_iur']),
        ]);

    }
    public function userLogout(){
        //Session::forget('user');
        Auth::guard('user')->logout();
        toastr()->success('Вы успешно вышли с аккаунта', '');
        return redirect()->route('main');
    }
    public function testEmail(){
        $token = Str::random(60);
        Mail::to('denisbocharov12@gmail.com')->send(new ActivationCodeMail($token));
        return '21321';
    }
}
