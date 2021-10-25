<?php

use App\Components\AuthClientService;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\backEnd\UserController;
use App\Http\Controllers\backEnd\AdminController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

use App\Http\Controllers\Auth\Admin\AdminLoginController;
use App\Http\Controllers\Auth\User\UserLoginController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\CalculatorController;
use App\Http\Controllers\backEnd\CompanyController;
use App\Http\Controllers\backEnd\SearchController;
use App\Http\Controllers\backEnd\PayedController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::group(['prefix' => LaravelLocalization::setLocale(), 'middleware' => ['localeSessionRedirect', 'localizationRedirect','localize','localeCookieRedirect','localeViewPath' ]], function()
{
    //Login and Register FrontEnd
    Route::post('/auth', [UserLoginController::class, 'userAuth'])->name('user.auth');
    Route::get('/login', [UserLoginController::class, 'userLogin'])->name('user.login');
    Route::get('/register', [UserLoginController::class, 'userRegister'])->name('user.register');
    Route::post('/newuser-fiz', [UserLoginController::class, 'registerSubmitFiz'])->name('user.create-fiz');
    Route::post('/newuser-iur', [UserLoginController::class, 'registerSubmitIur'])->name('user.create-iur');
    Route::get('/logout', [UserLoginController::class, 'userLogout'])->name('user.logout');

    Route::group(['prefix'=>'user', 'middleware' =>['PreventBackHistory','user']],function (){
        Route::get('/dashboard', [UserController::class, 'dashboard'])->name('user.dashboard');
        Route::post('/get-table',[UserController::class, 'getTable'])->name('user.get-table');
        Route::get('/profile', [UserController::class, 'profile'])->name('user.profile');

        Route::get('add-package',[UserController::class, 'addPackage'])->name('add.package');
        Route::post('register-package',[UserController::class,'registerPackage'])->name('register.package');

        Route::post('shipping-pay',[UserController::class, 'shippingPay'])->name('user.shipping-pay');
    });
    Route::get('send-email', [UserLoginController::class, 'testEmail']);
    // Password Change
    Route::post('/reset-password-email',[UserController::class,'passwordChange'])->name('user.reset-email');
    Route::get('reset-password/{token}',[UserController::class, 'getPassword'])->name('reset.token');
    Route::get('reset-password',[UserController::class, 'resetPassword'])->name('reset.password');
    Route::post('reset-password', [UserController::class, 'updatePassword'])->name('reset.pass');
    // Activate Account
    Route::get('activate-account/{token}',[UserController::class, 'activateAccount'])->name('activate.token');
    Route::post('activate-account', [UserController::class, 'statusActivate'])->name('activate.account');
    // Pages
    Route::get('/', [IndexController::class, 'index'])->name('main');

    Route::get('shops', [PagesController::class, 'shops'])->name('shops');
    Route::get('faq', [PagesController::class, 'faq'])->name('faq');
    Route::get('adresses', [PagesController::class, 'adresses'])->name('adresses');
    Route::get('prohibited', [PagesController::class, 'prohibited'])->name('prohibited');
    Route::get('about-us', [PagesController::class, 'aboutus'])->name('aboutus');
    Route::get('cargo',[PagesController::class, 'cargo'])->name('cargo');
    Route::post('cargo-services',[PagesController::class,'cargoPost'])->name('cargo.post');
    Route::get('search',[SearchController::class, 'search'])->name('search');
    Route::get('contacts',[PagesController::class, 'contacts'])->name('contacts');

    Route::get('/administration',[AdminLoginController::class,'login'])->name('admin.login');
    Route::post('/admin-auth',[AdminLoginController::class,'auth'])->name('admin.auth');
});

//Route::get('/home', [\App\Http\Controllers\IndexController::class, 'AuthState'])->name('home');

// Admin Login FORM
Route::group(['prefix'=>'admin','middleware'=>['admin','PreventBackHistory']],function (){
    Route::get('/logout', [AdminLoginController::class, 'adminLogout'])->name('admin.logout');
    Route::get('/dashboard',[AdminController::class, 'index'])->name('admin.dashboard');

    //Company Section
    Route::resource('/company', CompanyController::class);
    Route::post('company_status', [CompanyController::class, 'companyStatus'])->name('company.status');
    Route::post('company_delete', [CompanyController::class, 'companyDelete'])->name('company.delete');

    // Payed Section
    Route::resource('/payed', PayedController::class);
    Route::post('payed_status', [PayedController::class, 'payedStatus'])->name('payed.status');
    Route::post('payed_delete', [PayedController::class, 'payedDelete'])->name('payed.delete');

    Route::get('view-pdf-payed', [CompanyController::class, 'PDFView'])->name('view.pdf.payed');
    Route::get('download-pdf-payed', [CompanyController::class, 'GeneratePDF'])->name('download.pdf.payed');
    //PDF
    Route::get('view-pdf', [CompanyController::class, 'PDFView'])->name('view.pdf');
    Route::get('download-pdf', [CompanyController::class, 'GeneratePDF'])->name('download.pdf');
});

