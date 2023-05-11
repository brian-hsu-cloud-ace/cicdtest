<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Http;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

#Route::get('/', function () {
#    return view('welcome');
#});

#Route::get('/test', AuthController::class);

#Route::view('/test', 'test');

#Route::get('/login', GoogleIapController::class);

#session啟動
Route::group(['web'], function () {
    #需要登入驗證的都放進這邊
#    Route::middleware(['Istrust'])->group(function () {
        Route::get('/', function (Request $request) {
            return view('welcome');
        });
#    });
});