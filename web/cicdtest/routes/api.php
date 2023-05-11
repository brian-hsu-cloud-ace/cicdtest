<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use Illuminate\Support\Str;

use App\Http\Controllers\TestapiController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

#Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
#    return $request->user();
#});

#Route::group(['middleware' => 'api'], function () {
#    or
Route::group(['api'], function () {
    #需要登入驗證的都放進這邊
#    Route::middleware(['GoogleOAuth2JWT'])->group(function ($request) {
        Route::post('/test', TestapiController::class)->name('api.test');
#    });
});