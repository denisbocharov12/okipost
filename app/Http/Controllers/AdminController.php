<?php

namespace App\Http\Controllers;

use App\Components\AuthClientService;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct(AuthClientService $authClientService)
    {
        parent::__construct();
        $this->authClientService = $authClientService;
    }

    public function index(){
        return view('dashboards.admin.index');
    }

    public function AuthState(){
        $email = "denisbocharov12@gmail.com";
        $password = "YIP3b9F1WM";
        $auth = $this->authClientService->Auth($email, $password);
        //dd($auth);
    }
}
