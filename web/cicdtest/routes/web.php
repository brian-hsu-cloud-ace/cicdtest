<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GoogleIapController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::view('/login', 'test');

#Route::get('/login', GoogleIapController::class);

##session啟動
#Route::group(['middleware' => 'web'], function () {
#    #需要登入驗證的都放進這邊
#    Route::middleware(['googleiap'])->group(function () {
#        Route::get('/', function () {
#            return view('test');
#        });
#    });
#});