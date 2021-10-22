<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\V1\RunPayController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::middleware(['token'])->get('/runpay', [RunPayController::class, 'runPay'])->name('api.runpay-check');
//Route::middleware(['token'])->post('/runpay-add', [RunPayController::class, 'addBalance'])->name('api.runpay-balance');
//Route::get('/runpay-check', [RunPayController::class, 'check'])->name('api.runpay-check');
