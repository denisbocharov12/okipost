<?php

namespace App\Http\Controllers\Auth\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AdminLoginController extends Controller
{
    public function login(){
        return view('backend.admin.auth.index');
    }
    public function auth(Request $request){
        if (Auth::guard('admin')->attempt(['email'=>$request->email,'password'=>$request->password, 'status'=>'active'])){
            Session::put('admin', $request->email);
            if (Session::get('url.intended')){
                return Redirect::to(Session::get('url.intended'));
            } else {
                toastr()->success('','Успешный вход в аккаунт!');
                return redirect()->intended(route('admin.dashboard'));
            }
        }else{
            toastr()->error('Неверный логин или пароль','Упс...');
            return redirect()->back();
        }
    }
    public function adminLogout(){
        Session::forget('admin');
        Auth::guard('admin')->logout();
        toastr()->success('Вы успешно вышли из системы','Успех');
        return redirect()->route('main');
    }
}
