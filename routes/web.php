<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['register' => false]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::view('layouts','backend.layouts.app');

Route::resource('users', UserController::class);
Route::get('users_datatable', [UserController::class, 'activityDatatable'])->name('users_datatable');
Route::post('/user/email', [UserController::class, 'emailCheck']);