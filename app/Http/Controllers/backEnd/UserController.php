<?php

namespace App\Http\Controllers\backEnd;

use App\Http\Controllers\Controller;
use App\Mail\ActivationCodeMail;
use App\Mail\PasswordChangeMail;
use App\Models\FileModel;
use App\Models\PackageModel;
use App\Models\PayedModel;
use App\Models\User;
use App\Models\UserSessions;
use App\Services\SMSService;
use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class UserController extends Controller
{
    protected $userService;
    protected $smsService;
    public function __construct(UserService $userService, SMSService $SMSService)
    {
        $this->userService = $userService;
        $this->smsService = $SMSService;
    }

    public function index(){

        return view('backend.user.index');
    }
    public function dashboard(Request $request){
        if (Auth::guard('user')->check()){
            //dd($this->userService->GetUser());
            //dd($this->userService->GetUserTable('4'));
            $userTables = $this->userService->GetUserTables();
            $user = Auth::guard('user')->user();
            return view('frontend.pages.user.dashboard', compact(['user','userTables']));
        } else {
            return redirect()->route('user.login');
        }
    }
    public function getTable(Request $request){
        if ($request->ajax()){
            $table = $request->table;
            $getTable = $this->userService->GetUserTable($table);
            $mdl_to_usd = 17.6;
            $render = view('frontend.pages.user._components.tab',compact(['getTable','table','mdl_to_usd']))->render();
            $responce['render'] = $render;
            $responce['table'] = $table;
            $responce['status'] = true;
            $responce['msg'] = 'Таблица загружена';
            return $responce;
        } else{
            $responce['status'] = false;
            $responce['msg'] = 'Что-то пошло не так...';
            return $responce;
        }
    }
    public function profile(){
        if (Auth::guard('user')->check()){
            $userinfo = $this->userService->GetUser();
            return view('frontend.pages.user.index');
        } else {
          return redirect()->route('user.login');
        }

    }
    public function resetPassword(){
        return view('frontend.auth.forget-password');
    }
    public function passwordChange(Request $request){
        $request->validate([
            'email' => 'required|email|exists:users',
        ]);
        $token = Str::random(60);

        DB::table('password_resets')->insert(
            ['email' => $request->email, 'token' => $token, 'created_at' => Carbon::now()]
        );
        Mail::to($request->email)->send(new PasswordChangeMail($token));
        return back()->with('message', 'We have e-mailed your password reset link! Please,check');
    }
    public function getPassword($token) {
        $email = DB::table('password_resets')->where('token',$token)->first();
        if(!$email){
            toastr()->error('Invalid token!', 'Error');
            return redirect()->back();
        }
        $user_email = $email->email;
        return view('frontend.auth.reset', compact(['token','user_email']));
    }
    public function updatePassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users',
            'password' => 'required|string|min:6|confirmed',
            'password_confirmation' => 'required',

        ]);
        $updatePassword = DB::table('password_resets')
            ->where(['email' => $request->email, 'token' => $request->token])
            ->first();

        if(!$updatePassword){
            toastr()->error('Invalid token!', 'Error');
            return redirect()->back();
        }
        $user_info = User::where('email', $request->email)->first();
        $uid = $user_info->code;
        $user_reset = $this->userService->PasswordReset($uid,$request->password);
        if ($user_reset['status'] == "done"){
            User::where('email', $request->email)
                ->update(['password' => Hash::make($request->password)]);
        } else{
            toastr()->error('Что-то пошло не так...', 'Ошибка');
            return redirect()->back();
        }
        DB::table('password_resets')->where(['email'=> $request->email])->delete();
        Session::forget('user');
        Auth::guard('user')->logout();
        toastr()->success('','Ваш пароль был успешно изменен!');
        return redirect()->route('user.login');
    }
    public function activateAccount($token){
        $code = DB::table('users_activates')->where(['token'=>$token, 'status'=> 'inactive'])->first();
        if ($code){
            $user_code = $code->user_or_org_id;
            return view('frontend.auth.sms-activate', compact(['token','user_code']));
        } else{
            toastr()->success('','Вы уже активировали аккаунт...');
            return redirect()->route('main');
        }

    }
    public function statusActivate(Request $request)
    {
        $activateAccount = DB::table('users_activates')
            ->where(['user_or_org_id' => $request->code, 'token' => $request->token])
            ->first();
        $response = $this->userService->ActivateAccount($request->input('sms'),$request->input('code'));
        if ($response->json('status') == "done" && $activateAccount !== null){
            $user_activate = User::where('code', $request->code)
                ->update(['status' => 'active']);
            DB::table('users_activates')
                ->where(['user_or_org_id' => $request->code, 'token' => $request->token])
                ->update([
                    'status'=>'active'
                ]);
            //DB::table('password_resets')->where(['email'=> $request->email])->delete();
            toastr()->success('','Вы успешно активировали аккаунт');
            return redirect()->route('main');
        } else {
            toastr()->error('','Неверный смс код...');
            return redirect()->back();

        }
    }
    public function addPackage(){
        if (Auth::guard('user')->check()){
            $token = Auth::guard('user')->user()->token;
            $addresses = $this->userService->GetAddresses($token);
            //dd($addresses);
            return view('frontend.pages.user.packages.wrap',compact(['addresses']));
        } else {
            return redirect()->route('user.login');
        }
    }
    public function registerPackage(Request $request){
        $request->validate([
            'track' => 'required',
            'price' => 'required',
            'c' => 'required',
            'delivery_method_select' => 'required',
            'info' => 'required',

        ]);
        $userPackage = new PackageModel();
        $c = $request->input('c');
        $track = $request->input('track');
        $type = $request->input('type');
        $url = $request->input('url');
        $price = $request->input('price');
        $currency = $request->input('currency');
        $info = $request->input('info');
        $delivery_method_select = $request->input('delivery_method_select');
        $user_to = $request->input('user_to');
        $address = [];
        if( $delivery_method_select == '1'){
            $user_to = true;
        }
        if($user_to == 'otheraddress'){
            $address = [
                'city' => $request->input('city'),
                'address1' => $request->input('address1'),
                'name' => $request->input('name'),
                'surname' => $request->input('surname'),
                'phone' => $request->input('phone'),
                'passport' => $request->input('passport')
            ];
            $this->userService->LocalRegisterAddress($address);
        } else{
            $address = [
                'city' => null,
                'address1' => null,
                'name' => null,
                'surname' => null,
                'phone' => null,
                'passport' => null
            ];
            $userPackage->addressid = $user_to;
        }
        $comment = $request->input('comment');
        $add = $request->input('add');
        if ($request->hasFile('invoice_revise')){
            $file_revise = $request->file('invoice_revise');
            $file_revise_name = pathinfo($file_revise->getClientOriginalName(),PATHINFO_FILENAME);
            $reviseName   = $file_revise_name . rand(111, 999) . '.' . $file_revise->getClientOriginalExtension();
            $file_revise->move(storage_path('private'),$reviseName);
            $fileModel = new FileModel();
            $fileModel->filename = $reviseName;
            $fileModel->path = "/storage/private/$reviseName";
            $fileModel->package_id = $userPackage->id;
            $fileModel->type  = 'revise';
            $fileModel->save();
            $add['invoice_revise'] = "https://okipost.md/storage/private/$reviseName";
        }
        if($request->hasFile('pre_custom')){
            $file_pre_custom = $request->file('pre_custom');
            $file_pre_custom_name = pathinfo($file_pre_custom->getClientOriginalName(),PATHINFO_FILENAME);
            $precustomName   = $file_pre_custom_name . rand(111, 999) . '.' . $file_pre_custom->getClientOriginalExtension();
            $file_pre_custom->move(storage_path('private'),$precustomName);
            $fileModel = new FileModel();
            $fileModel->filename = $precustomName;
            $fileModel->path = "/storage/private/$precustomName";
            $fileModel->package_id = $userPackage->id;
            $fileModel->type  = 'pre_custom';
            $fileModel->save();
            $add['pre_custom'] = "https://okipost.md/storage/private/$precustomName";
        }
        //Create Package Model
        $userPackage->country = $c;
        $userPackage->track = $track;
        $userPackage->type = $type;
        $userPackage->currency = $currency;
        $userPackage->comment = $comment;
        $userPackage->price = $price;
        $userPackage->url = $url;
        $userPackage->delivery_method = $delivery_method_select;
        if ($user_to == 'otheraddress'){
            $userPackage->city = $request->input('city');
            $userPackage->address1 = $request->input('address1');
            $userPackage->name = $request->input('name');
            $userPackage->surname = $request->input('surname');
            $userPackage->phone = $request->input('phone');
            $userPackage->passport = $request->input('passport');
        }
        $userPackage->additional_services = json_encode($add, true);
        $userPackage->info = $info;
        $userPackage->code = Auth::guard('user')->user()->code;
        $userPackage->save();
        if ($c == 'china' || $c == 'usa' || $c == 'germany'){
            $data_package = $this->userService->AddPackage(
                $c,$track,$url,$address,
                $price,$currency,$info,$delivery_method_select,
                $user_to,$comment,json_encode($add, true));
            if (array_key_exists('done',$data_package)){
                toastr()->success('','Вы успешно добавили посылку');
                return redirect()->route('user.dashboard');
            } else{
                toastr()->error($data_package['msg'],'Error');
                return redirect()->back();
            }
        } elseif($c == 'turkey'){

        } else{
            toastr()->error('Что-то пошло не так','Упс...');
            return redirect()->back();
        }
    }
    public function shippingPay(Request $request){
        $user = $this->userService->GetUser();
        $curs_usd_to_mdl = 17.6;
        $track = $request->input('track');
        $shipping_price = '';
        $balance = $user['bonuses'];
        $tables = $this->userService->GetUserTable(3);
        foreach ($tables['parceldata'] as $table){
            switch ($table['track']){
                case $track:
                    $shipping_price = $table['shipping_price'];
                    break;
            }
        }
        $needed_balance = $balance / $curs_usd_to_mdl;
        if ($needed_balance >= $shipping_price){
            $payedModel = new PayedModel();
            $update_money = Auth::guard('user')->user()->money - ($shipping_price * $curs_usd_to_mdl);
            $user_update = User::where('code',auth()->guard('user')->user()->code)->first();
            $user_update->money = $update_money;
            $user_update->save();
            $payedOkipost = $this->userService->ShippingPay($track);
            $payedModel->code =  (int)Auth::guard('user')->user()->code;
            $payedModel->track = $track;
            $payedModel->currency = 'USD';
            $payedModel->needed_sum = $shipping_price;
            if ($payedOkipost['status'] = true){
                $payedModel->payed = 'yes';
            }
            else{
                $payedModel->payed = 'no';
            }
            $payedModel->save();
            $responce['status'] = true;
            $responce['msg'] = 'Вы успешно оплатили посылку';
            return $responce;
        }else{
            $responce['status'] = false;
            $responce['msg'] = 'У вас недостаточно средств для оплаты посылки';
            return $responce;
        }
    }
}
