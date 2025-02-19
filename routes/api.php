<?php

use App\Http\Controllers\Api\V1;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => 'v1','middleware' => "setlang"], function () {
    Route::post('/register', [V1\UserController::class, 'register']);
    Route::post('/login', [V1\UserController::class, 'login']);
    Route::post('/forget-password', [V1\UserController::class, 'forgetPassword']);
    Route::post('/check-code', [V1\UserController::class, 'checkCode']);
    Route::post('/create-password', [V1\UserController::class, 'createPassword']);

    //Route::get('/setting', [V1\SettingController::class, 'index']);


    Route::group(['middleware' => 'auth:sanctum'], function () {

        Route::get('/profile', [V1\UserController::class, 'profile']);
        Route::post('/update-profile', [V1\UserController::class, 'updateProfile']);
        Route::post('/logout', [V1\UserController::class, 'logout']);
        Route::post('/delete-account', [V1\UserController::class, 'delete']);


        Route::get('/doctors', [V1\DoctorController::class, 'getDoctors']);
        Route::get('/banners', [V1\HomeController::class, 'banners']);
        Route::get('/active-pack', [V1\PackController::class, 'activePack']);
        Route::post('/starter-pack', [V1\PackController::class, 'starterPack']);
        Route::post('/on-track-pack', [V1\PackController::class, 'onTrackPack']);
        Route::post('/redeeming-pack', [V1\PackController::class, 'redeemingPack']);
        Route::post('/request-redeeming-pack', [V1\PackController::class, 'requestRedeemingPack']);

    });

});
