<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Customer\Auth\AuthController;
use App\Http\Controllers\Api\Customer\UserController;

Route::group(['prefix' => 'customer'], function () {
    Route::post('register', [AuthController::class, 'register']);
    Route::post('login', [AuthController::class, 'login']);

    Route::group(['middleware' => ['auth:sanctum']], function () {
        Route::put('user',[UserController::class,'update']);
        Route::get('user',[UserController::class,'show']);
        Route::delete('user',[UserController::class,'delete']);
        Route::post('change-password',[UserController::class,'changePassword']);

        Route::post('logout',[AuthController::class,'logout']);
    });
});
