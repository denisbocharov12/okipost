<?php

namespace App\Http\Controllers\backEnd;

use App\Http\Controllers\Controller;
use App\Services\UserService;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    protected $userService;
    public function __construct(UserService $userService){
        $this->userService = $userService;
    }
    public function search(Request $request){
        $track = $request->input('search');
        $package = $this->userService->SearchPackage($track);
        //dd($package);
        return view('frontend.pages.search.index',compact(['package']));
    }
}
